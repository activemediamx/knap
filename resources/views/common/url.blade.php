<script>
    // global app configuration object
    var config = {
        login: {
            get: "{!! route('user.login_check') !!}"
        },
        users: {
            create: "{{route('users.create')}}",
            edit: "{{route('users.edit',':id')}}",
            update: "{{route('users.update',':id')}}",
            store: "{{route('users.store')}}",
            role: {
                edit: "{{route('user-roles.edit',':id')}}",
                assign_role: "{{route('user.update-role')}}",
            }
        }

    };
</script>