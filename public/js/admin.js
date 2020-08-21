$(document).ready(function ()
{
    $('#add-select').click(function () {
        let book_list = JSON.parse(books);
        let html = '';
        html += '<select name="book_id" id="book-select" class="form-control mt-3">';
        $.each(book_list, function (key, value) {
            console.log(value);
            html += '<option value="'+ value.id +'">';
            html += value.name;
            html += '</option>';
        })

        html += '</select>'

        $('#div-select').append(html)
    })
})
