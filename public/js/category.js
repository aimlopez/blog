$(document).ready(function ($) {

    var token = $("input[name='_token']").val();
    

    $('.create-category .cat-submit').on('click', createCategory);
    $('#cat-links #delete-category').on('click', deleteCategory);
    $('#cat-links #edit-category').on('click', editCategory);
    

    /**
     * Create categories in Categories Page
     */

    function createCategory(e) {
        e.preventDefault();
        var categoryName = $('input#category').val();
        
        if (categoryName.length === 0) {
            alert("Please enter a valid Category name!");
            return;
        }
       
        var data = {
            name: categoryName
        };

        $.ajax({
                url: '/admin/category/create',
                type: 'POST',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
            .done(function (msg) {
                console.log(msg);
                $('input#category').val('');
                location.reload();
            });

    }; //end on.click.create


    /**
     * Delete category in Categories Page
     */
    function deleteCategory(e) {
        e.preventDefault();
        console.log('aimara')
        var categoryId = $(e.target).parent().parent().parent().data('id');

        console.log(categoryId)

        $.ajax({
            url: '/admin/category/' + categoryId + '/delete',
            type: 'GET',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': token
            }

        }).done(function (msg) {
            console.log(msg);
            //$('input#category').val('');
            location.reload();
        });
    } //end on.click.delete

    function editCategory(e) {
        e.preventDefault();
        var input = $(e.target).siblings('input');
        

        input.animate({
            'opacity': 'toggle'
        });
        $(e.target).text('Save').off('click');
       $('#cat-links #edit-category').bind('click', saveEditedCategory(input))
    }
    
    function saveEditedCategory(input){
        var categoryName = $(input).val();
        var caterogyID = $(input).parent().parent().parent().data('id')

        var data = {
            name: categoryName,
            id: caterogyID,
        };

        $.ajax({
                url: '/admin/category/update',
                type: 'POST',
                data: data,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': token
                }
            })
            .done(function (msg) {

                console.log(msg);
                location.reload();
            });

        
    }
   
    

}); //end document.ready