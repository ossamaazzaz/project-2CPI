var approvedUsers = [];
		function addApprovedUser(id,userId,userState) {
			if ( userState == 'pending' && !approvedUsers.includes(userId)) {
				id.innerHTML = "Approved";
		    	approvedUsers.push(userId);
			}
		}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function (){
            $('#get').click(function(){
                $.ajax({
                    type : "GET",
                    url : "get",
                    success : function(data){
                        console.log("data : "+data);
                        $("#req").append(data);
                    }
                });
            });
            $('#sub').click(function(){
                var dataString = "ids="+approvedUsers;
                $.ajax({
                    type : "POST",
                    url : "/admin/users",
                    data : dataString,
                    success : function(data){
                        console.log(data); }
                });
            });
        });

