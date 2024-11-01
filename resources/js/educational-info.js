$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Create Educational Info
    $('#create-form').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/educational-info',
            data: $(this).serialize(),
            success: function(response) {
                if (!response.error) {
                    let newRow = `
                        <tr data-id="${response.educationalInfo.id}">
                            <td>${response.educationalInfo.title}</td>
                            <td>${response.educationalInfo.subject}</td>
                            <td>${response.educationalInfo.level}</td>
                            <td>${response.educationalInfo.publication_date}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn">Edit</button>
                                <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                            </td>
                        </tr>
                    `;
                    
                    $('#educational-info-table tbody').append(newRow);
                    $('#createModal').modal('hide');
                    $('#create-form')[0].reset();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.messages;
                    Object.keys(errors).forEach(function(key) {
                        alert(errors[key][0]);
                    });
                }
            }
        });
    });

    // Populate Edit Modal
    $(document).on('click', '.edit-btn', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let title = row.find('td:nth-child(1)').text();
        let subject = row.find('td:nth-child(2)').text();
        let level = row.find('td:nth-child(3)').text();
        let publicationDate = row.find('td:nth-child(4)').text();

        $('#edit-id').val(id);
        $('#edit-title').val(title);
        $('#edit-subject').val(subject);
        $('#edit-level').val(level);
        $('#edit-publication-date').val(publicationDate);

        $('#editModal').modal('show');
    });

    // Update Educational Info
    $('#edit-form').on('submit', function(e) {
        e.preventDefault();
        let id = $('#edit-id').val();

        $.ajax({
            type: 'PUT',
            url: `/educational-info/${id}`,
            data: $(this).serialize(),
            success: function(response) {
                if (!response.error) {
                    let updatedInfo = response.educationalInfo;
                    let row = $(`tr[data-id="${id}"]`);
                    
                    row.find('td:nth-child(1)').text(updatedInfo.title);
                    row.find('td:nth-child(2)').text(updatedInfo.subject);
                    row.find('td:nth-child(3)').text(updatedInfo.level);
                    row.find('td:nth-child(4)').text(updatedInfo.publication_date);

                    $('#editModal').modal('hide');
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.messages;
                    Object.keys(errors).forEach(function(key) {
                        alert(errors[key][0]);
                    });
                }
            }
        });
    });

    // Delete Educational Info
    $(document).on('click', '.delete-btn', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');

        if (confirm('Are you sure you want to delete this educational information?')) {
            $.ajax({
                type: 'DELETE',
                url: `/educational-info/${id}`,
                success: function(response) {
                    if (!response.error) {
                        row.remove();
                    }
                }
            });
        }
    });
});