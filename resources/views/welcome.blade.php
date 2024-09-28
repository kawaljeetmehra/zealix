

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">

  <title>Zealex - Login</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('https://i.postimg.cc/XYjWrv36/dark-hexagonal-background-with-gradient-color_79603-1409.jpg') no-repeat;
    background-size: cover;
    background-position: center;
}

.box{
    position: relative;
    width: 370px;
    height: 450px;
    background: #1c1c1c;
    border-radius: 50px 5px;
    overflow: hidden;
}

.box::before{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 370px;
    height: 450px;
    background: linear-gradient(60deg, transparent, #45f3ff, #45f3ff);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
}

.box::after{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 370px;
    height: 450px;
    background: linear-gradient(60deg, transparent, #d9138a, #d9138a);
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
}

@keyframes animate{
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
}

form{
    position: absolute;
    inset: 2px;
    border-radius: 50px 5px;
    background: #28292d;
    z-index: 10;
    padding: 30px 30px;
    display: flex;
    flex-direction: column;
}

h2{
    color: #45f3ff;
    font-size: 35px;
    font-weight: 500;
    text-align: center;
}

.input-box{
    position: relative;
    width: 300px;
    margin-top: 35px;
}

.input-box input{
    position: relative;
    width: 100%;
    padding: 20px 10px 10px;
    background: transparent;
    border: none;
    outline: none;
    color: #23242a;
    font-size: 1em;
    letter-spacing: .05em;
    z-index: 10;
}

input[type="submit"]{
    font-size: 20px;
    border: none;
    outline: none;
    background: #45f3ff;
    padding: 5px;
    margin-top: 40px;
    border-radius: 90px;
    font-weight: 600;
    cursor: pointer;
}

input[type="submit"]:active{
    background: linear-gradient(90deg, #45f3ff, #d9138a);
    opacity: .8;
}

.input-box span{
    position: absolute;
    left: 0;
    padding: 20px 10px 10px;
    font-size: 1em;
    color: #8f8f8f;
    pointer-events: none;
    letter-spacing: .05em;
    transition: .5s;
}

.input-box input:valid ~ span,
.input-box input:focus ~ span{
    color: #45f3ff;
    transform: translateX(-10px) translateY(-30px);
    font-size: .75em;
}

.input-box i{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background: rgb(69, 243, 255);
    border-radius: 4px;
    transition: .5s;
    pointer-events: none;
    z-index: 9;
}

.input-box input:valid ~ i,
.input-box input:focus ~ i{
    height: 44px;
    background: rgba(69, 243, 255, .5);
}

.links{
    display: flex;
    justify-content: space-between;
}

.links a{
    margin: 25px 0;
    font-size: 1em;
    color: #8f8f8f;
    text-decoration: none;
}

.links a:hover,
.links a:nth-child(2){
    color: #45f3ff;
}

.links a:nth-child(2):hover{
    color: #d9138a;
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
</head>

<body translate="no">
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Form</title>
</head>
<body>
    <div class="box">
        <form action="{{route('products.index')}}">
            <div class="input-box">
                <h2>Sign In</h2>
                <input type="text" required>
                <span>Username</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" required>
                <span>Enter Password</span>
                <i></i>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
  
  
  
</body>

</html>
