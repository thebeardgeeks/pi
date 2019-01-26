<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>parse</title>
</head>
<body>
	<style>
	.RNNXgb {
		background: #fff;
		display: flex;
		border-radius: 2px;
		border: none;
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		z-index: 3;
		height: 44px;
		margin:200px auto;
		width: 484px;
	}
	.gLFyf {
		background-color: transparent;
		border: none;
		
		color: rgba(0,0,0,.87);
		word-wrap: break-word;
		outline: none;
		display: flex;
		flex: 100%;
		-webkit-tap-highlight-color: transparent;
		padding: 15px 10px 10px 15px
	}

	button {
		background-image: -webkit-gradient(linear,left top,left bottom,from(#f5f5f5),to(#f1f1f1));
		background-image: -webkit-linear-gradient(top,#f5f5f5,#f1f1f1);
		-webkit-border-radius: 2px;
		-webkit-user-select: none;
		background-color: #f2f2f2;
		border: 1px solid #f2f2f2;
		border-radius: 2px;
		color: #757575;
		cursor: pointer;
		font-family: arial,sans-serif;
		font-size: 13px;
		font-weight: bold;

		min-width: 54px;
		padding: 0 16px;
		text-align: center;
	}

	.logo{
		
		position: relative;
		transform: translate(-50%,90%);
		left: 50%;
		top: 10%;
	}.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}


</style>
<img src="logo.png" class="logo">
<form action="pars.php" class="RNNXgb" method="POST">
	<input  type="text" class="gLFyf" name="search">
	<button  type="submit">Спарсить с Юлы</button>
</form>
</body>
</html>