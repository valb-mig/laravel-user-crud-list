$(document).ready(function () {

    $('.edit-user').on('click', function () {

        let userId = $(this).data('user-id');

        $('#edit-form-name').val("");
        $('#edit-form-email').val("");

        $('#form-editModal').attr('action', `/user/edit/${userId}`)

        $.ajax({
            url:  `/user/get/${userId}`,
            type: 'GET',
            dataType: 'json',
            success: (userData) => {
                $('#edit-form-name').val(userData.user_name);
                $('#edit-form-email').val(userData.user_email);
            },
            error: function (xhr, status, error) {
                console.error(status, xhr.status, error);
            }
        });
    });
});