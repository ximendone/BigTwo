var apiroot = "../server/api/"
function to_register() {
    $("#login").empty();
    $("#login").append('<form><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">Username</label><input type="text" class="form-control" id="username" aria-describedby="emailHelp"></div><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">E-mail</label><input type="email" onkeyup="value=value.replace(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/)" class="form-control" id="email" aria-describedby="emailHelp"></div><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">Password</label><input type="password" class="form-control" id="password" aria-describedby="emailHelp"></div><div class="mb-3"><label for="exampleInputPassword1" class="form-label textcolor">Password check</label><input type="password" class="form-control" id="passwordcheck"></div><input type="button" class="btn btn-primary" onclick="do_register()" value="註冊"></input><input type="button" class="btn btn-primary" onclick="to_index()" value="返回"></input></form>');
}
function to_forgetpassword() {
    $("#login").empty();
    $("#login").append('<form><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">Username</label><input type="text" class="form-control" id="username" aria-describedby="emailHelp"></div><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">E-mail</label><input type="email" class="form-control" id="email" aria-describedby="emailHelp"></div><input type="button" class="btn btn-primary" onclick="do_forgetpassword()" value="找回"></input><input type="button" class="btn btn-primary" onclick="to_index()" value="返回"></input></form>');
}
function to_index() {
    $("#login").empty();
    $("#login").append('<form><div class="mb-3"><label for="exampleInputEmail1" class="form-label textcolor">Username</label><input type="text" class="form-control" id="username" aria-describedby="emailHelp"></div><div class="mb-3"><label for="exampleInputPassword1" class="form-label textcolor">Password</label><input type="password" class="form-control" id="password"></div><div class="mb-3 form-check"><input type="checkbox" class="form-check-input" id="exampleCheck1"><label class="form-check-label textcolor" for="exampleCheck1">Check me out</label></div><button type="submit" class="btn btn-primary">登入</button><input type="button" class="btn btn-primary" onclick="to_register()" value="註冊"></input><input type="button" class="btn btn-primary" onclick="to_forgetpassword()" value="忘記密碼"></input></form>');
}


function do_register() {
    $.ajax({
    type: 'POST',
    url: apiroot + 'register.php',
    data: {
        username: $("#username"). val(),
        password: $("#password"). val(),
        email: $("#email"). val(),
        nickname: "Nick"
    },
    success: function(response) {
        console.log(response);
        var obj = jQuery.parseJSON(response);
        console.log(obj);
        if (obj.success == true){
            alert("註冊成功");
            to_index();
        }
        else {
            if (obj.reason == "username has been used"){alert("使用者名稱已經存在");}
            else {alert("資料不齊全");}
        }
    }
})
}