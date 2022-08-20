$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type : 'DELETE',
            datatype: 'JSON',
            data : { id },
            url : url,
            success: function (response) {
                if(response.result) {
                    console.log(233423);
                    location.reload();
                }else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}
