$(document).ready(function () {

    $('.edit-user').on('click', function () {

        let userID = $(this).data('user-id');

        $('#edit-form-name').val("");
        $('#edit-form-email').val("");

        $('#form-editModal').attr('action', `/edit/${userID}`)

        $.ajax({
            url: '/edit/' + userID,
            type: 'GET',
            dataType: 'json',
            success: (userData) => {
                $('#edit-form-name').val(userData.user_name);
                $('#edit-form-email').val(userData.user_email);
            },
            error: function (xhr, status, error) {
                console.error('Erro ao obter dados do usuário. Código de status:', xhr.status);
            }
        });
    });
});