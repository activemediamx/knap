(function () {
    var knap = (function () {
        return {

            // Login Function
            login : function () {
                return $.easyAjax({
                    url: laroute.route('user.login_check'),
                    type: "POST",
                    data: $("#login-form").serialize(),
                    container: "#login-form",
                    messagePosition: "inline"
                });
            },
            register : function (container){
                $.easyAjax({
                    url: laroute.route('post-register'),
                    type: "POST",
                    data: $("#register-form").serialize(),
                    container: "."+container,
                    messagePosition: "inline",
                    success: function (response) {
                        if(response.status == 'success'){
                            $('#register-form').remove();
                        }
                    }
                });
            },

            forget : function (container){
                $.easyAjax({
                    url: laroute.route('post-reset'),
                    type: "POST",
                    data: $("#forget-form").serialize(),
                    container: "."+container,
                    messagePosition: "inline",
                    success: function (response) {
                        if(response.status == 'success'){
                            $('#forget-form').remove();
                        }
                    }
                });
            },

            // Add Modal
            addModal : function (route) {
                 $.ajaxModal('#addEditModal',laroute.route(route));
            },

            // Show Edit Modal
            editModal : function (route, id) {
                var parameter = route.slice(0,-1);
                parameter = parameter.replace(/-/, '_');
                var arrJson = {};
                arrJson[parameter] = id;
                $.ajaxModal('#addEditModal',laroute.route(route+'.edit', arrJson));
            },

            // Show Add Edit Function
            addUpdate : function (route, id) {
                var url;
                var parameter = route.slice(0,-1);
                parameter = parameter.replace(/-/, '_');
                var arr = {};
                arr[parameter] = id;

                if(id != '') {
                    url = laroute.route(route+'.update', arr);
                } else {
                    url = laroute.route(route+'.store');
                }

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: $('#add-edit-form').serialize(),
                    container: "#add-edit-form",
                    file:true,
                    success: function(response) {
                        if (response.status == "success") {
                            if(typeof table != 'undefined'){
                                $('#addEditModal').modal('hide');
                                table._fnDraw();
                            }
                            if("imageName" in response){
                                $('#logo').attr('src',logoPath + response.imageName);
                            }
                        }
                    }
                });
            },

            // Assign role to user
            assignRole : function (id) {
                $.easyAjax({
                    type: 'POST',
                    url: laroute.route('user.update-role'),
                    data: $('#assign-role').serialize(),
                    container: "#assign-role",
                    success: function(response) {
                        if (response.status == "success") {
                            $('#addEditModal').modal('hide');
                            table._fnDraw();
                        }
                    }
                });
            },
            // Show Add Edit Function
            deleteAlert : function (route, msg, id ) {

                var parameter = route.slice(0,-1);
                parameter = parameter.replace(/-/, '_');
                var arrJson = {};
                arrJson[parameter] = id;

                $('#deleteModal').modal('show');

                $("#deleteModal").find('#info').html(msg);

                $('#deleteModal').find("#delete").off().click(function () {
                    url = laroute.route(route+'.destroy', arrJson);

                    $.easyAjax({
                        type: 'DELETE',
                        url: url,
                        container: "#deleteModal",
                        success: function (response) {
                            if (response.status == "success") {
                                $('#deleteModal').modal('hide');
                                table._fnDraw();
                            }
                        }
                    });

                });
            },

            // Update profile image
            updateImage : function (route, id) {
                var parameter = route.slice(0,-1);
                var arr = {};
                arr[parameter] = id;

                url = laroute.route(route+'.update', arr);

                $.easyAjax({
                    type: "POST",
                    url: url,
                    container: "#updateImage",
                    file:true,
                    success:function (response) {
                        if("imageName" in response){
                            $('.profile-image').attr('src',avatarPath + response.imageName);
                        }
                    }
                });
            },

            // Change password
            changePassword:function (route, id) {
                var parameter = route.slice(0,-1);
                var arr = {};
                arr[parameter] = id;

                url = laroute.route(route+'.update', arr);
                $.easyAjax({
                    type: "put",
                    url: url,
                    container: "#changePassword",
                    data: $("#changePassword").serialize()
                });
            },



        //submitting message
            sendMessage : function (container) {
            var submitText = $('#submitTexts').val();
            var dpID       = $('#dpID').val();
            //checking fields blank
            if(submitText == "" || submitText == undefined || submitText == null){
                $('#errorMessage').html('<div class="alert alert-danger"><p>Message field cannot be blank</p></div>');
            }else{

                var url = laroute.route('chat.message-submit');
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    messagePosition: '',
                    data:  {'message':submitText,'userID':dpID},
                    container: "#"+container,
                    blockUI: true,
                    redirect: false,
                    success: function (response) {
                        var blank = "";
                        $('#submitTexts').val('');

                        //getting values by input fields
                        var dpID   = $('#dpID').val();
                        var dpName = $('#dpName').val();

                        if(dpID){$('#dp_'+dpID).addClass('mt-comment active'); }

                        //set chat data
                        knap.getChatData(dpID, dpName);

                        //set user list
                        $('#user_list').html(response.userList);
                    }
                });
            }

            return false;
        },


        //getting all chat data according to user
            getChatData : function (id,dpName){

            var getID ='';
            $('#errorMessage').html('');
            if(id != "" && id != undefined && id != null)
            {
                //remove active and set active
                if(dpClassID)
                {
                    $('#dp_'+dpClassID).removeClass('active');
                    $('#dp_'+dpClassID).addClass('');
                }
                dpClassID = id;

                $('#dp_'+id).addClass('active');
                $('#dpID').val(id);
                $('#dpName').val(dpName);
                $('#dpName').html(dpName);
                getID = id;

            }else{getID = $('#dpID').val();}

            var url = laroute.route('chat');

            $.easyAjax({
                type: 'GET',
                url: url,
                messagePosition: '',
                data:  {'userID':getID},
                container: "#chatsRecord",
                success: function (response) {
                    //set messages in box
                    $('#chatsRecord').html(response.chatData);
                    $('#chatsRecord').animate({
                        scrollTop: $('#chatsRecord li:last-child').position().top
                    }, 'slow');
                    return false;
                }
            });
        },
            fetchUserImage: function (email) {
                $.easyAjax({
                    url: laroute.route('user.get-image',{'email': email}),
                    type: "GET",
                    container: "#add-edit-form",
                    success: function (response) {
                        $('#user-image').attr('src',response.image);
                    }
                });
            }


        }
    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return knap;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = knap;
    }
    else {
        window.knap = knap;
    }

}).call(this);