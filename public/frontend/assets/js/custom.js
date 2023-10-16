$(document).ready(function()
{
    $('.input-creat-set').hide();
    $('#btnAddSet').on('click',function (e){
        $('.input-creat-set').toggle();
    })
    //save add set
    $('#btnSaveSet').on('click',function (e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let url = _this.attr('data-url');
        let name = $('input[name="name"]').val();
        let parent = _this.attr('data-parent');
        let mess = '';
        if(name.length<=0){
            mess += 'err';
            $('input[name="name"]').focus();
            $('#nameCreate').text('Bạn chưa nhập tên mục');
        }else{
            $('#nameCreate').text('');
        }

        if(mess.length<=0){
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {name,parent},
                success: function (result) {
                    let html = '<div class="item-create-set"><p class="set-name">'+result.name+'<span class="edit-set" data-toggle="modal" data-target="#exampleModal'+result.id+'"><i class="fa fa-ellipsis-h"></i></span><span class="remove-set example-p-6" data-url="/post/get-remove-module/'+result.id+'"><i class="fa fa-times"></i></span></p> <a href="/post/get-create-module/'+result.id+'" class="add-more-module">+ Thêm module...</a> </div>';
                    $('#ListSet').append(html);
                    $('input[name="name"]').val('');
                    window.location.reload();
                },
                error: function (data, status) {
                    $("#btnSubmit").html("Có lỗi xảy ra !");
                    console.log(data);
                }
            });
        }

    });
    //edit set
    $('.btnEditSet').on('click',function (e){
        e.preventDefault();
        let mess ='';
        let _this = $(e.currentTarget);
        let url = _this.attr('data-url');
        let id = _this.attr('data-id');
        let name = $('.uname_'+id).val();
        if(name.length<=0){
            mess += 'err';
            $('#nameEdit').text('Bạn chưa nhập tên mục');
            return false;
        }else{
            $('#nameEdit').text('');
        }

        if(mess.length<=0){
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {name,id},
                success: function (result) {
                    $('#name_'+id).text(result.name);
                    $('#exampleModal'+id).modal("hide");
                },
                error: function (data, status) {
                    $("#btnSubmit").html("Có lỗi xảy ra !");
                    console.log(data);
                }
            });
        }

    });

    //edit parent set
    $('#btnEditParent').on('click',function (e){
       e.preventDefault();
       let mess ='';
       let _this = $(e.currentTarget);
       let url = _this.attr('data-url');
       let id = _this.attr('data-id');
       let name = $('.catname_'+id).val();
       let description = $('textarea[name="description"]').val();

        if(name.length<=0){
            mess += 'err';
            $('#errorName').text('Bạn chưa nhập tên khóa học');
            return false;
        }else{
            $('#errorName').text('');
        }

        if(mess.length<=0){
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {name,id,description},
                success: function (result) {
                    $('#SetParentName').text(result.name);
                    $('#categoryModal').modal("hide");
                },
                error: function (data, status) {
                    console.log(data);
                }
            });
        }


    });

    //upload file edit categoru


        $('#thumbnail').on('change', function(e) {
            e.preventDefault();
            let _this = $(e.currentTarget);
            let url = _this.attr('data-url');
            let id = _this.attr('data-id');
            var formData = new FormData();
            formData.append("thumbnail", $('#thumbnail')[0].files[0]);
            formData.append("id", id);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    let img = '<img src="'+response+'">'
                    $('.img-category-set').html(img);
                }
            });
        });


})
