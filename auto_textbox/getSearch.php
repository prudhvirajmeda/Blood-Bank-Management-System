<!doctype html>
<html>
<head>
    <title>jQuery Autocomplete search</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-1.12.0.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#txt_search").keyup(function(){
                var search = $(this).val();

                if(search != ""){

                    $.ajax({
                        url: 'getSearch.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){

                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var name = response[i]['name'];

                                $("#searchResult").append("<li value='"+id+"'>"+name+"</li>");

                            }

                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                setText(this);
                            });


                        }
                    });
                }

            });


        });


        // function setText(element){

        //     var value = $(element).text();
        //     var userid = $(element).val();

        //     $("#txt_search").val(value);
        //     $("#searchResult").empty();

        //     // Request User Details
        //     $.ajax({
        //         url: 'getSearch.php',
        //         type: 'post',
        //         data: {userid:userid, type:2},
        //         dataType: 'json',
        //         success: function(response){

        //             var len = response.length;
        //             $("#userDetail").empty();
        //             if(len > 0){
        //                 var username = response[0]['username'];
        //                 var email = response[0]['email'];
        //                 $("#userDetail").append("Username : " + username + "<br/>");
        //                 $("#userDetail").append("Email : " + email);
                    }
                }

            });
        }

    </script>
</head>
<body>
    <div class="container">
        <h1>jQuery Autocomplete Search</h1>
        <div id="div_content">

            <div>Enter Name </div>
            <div>
                <input type="text" id="txt_search" name="txt_search">
            </div>
            <ul id="searchResult"></ul>

            <div class="clear"></div>
            <div id="userDetail"></div>

        </div>
    </div>
</body>
</html>




<?php

$conn = oci_connect('medapr', 'V00763199', 'localhost:20037/xe');
echo 'lol';
// $type = $_POST['type'];
echo 'lol2';
// Search result
if($type == 1){
    $searchText = $_POST['search'];

    $sql = "SELECT H_ID,name FROM hospital where name like '%".$searchText."%' order by name asc limit 5";

    $result = oci_parse($conn,$sql);
    oci_execute($result);

    $search_arr = array();

    while($fetch = oci_fetch_array($result)){
        $id = $fetch['H_ID'];
        $name = $fetch['name'];

        $search_arr[] = array("id" => $id, "name" => $name);
    }

    echo json_encode($search_arr);
echo ' lol3';
}



// get User data
// if($type == 2){
//     $userid = $_POST['userid'];

//     $sql = "SELECT username,email FROM user where id=".$userid;

//     $result = mysql_query($sql);

//     $return_arr = array();
//     while($fetch = mysql_fetch_array($result)){
//         $username = $fetch['username'];
//         $email = $fetch['email'];

//         $return_arr[] = array("username"=>$username, "email"=> $email);
//     }

//     echo json_encode($return_arr);
// }

?>