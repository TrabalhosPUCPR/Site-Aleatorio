// JavaScript Document
var danilo = document.getElementById("personagem");
var carro = document.getElementById("carro");
var play = document.getElementById("play");
var pause = true;
var score = 0;

function pulo(){
	if(pause!=true){
		if(danilo.classList != "animar"){
			danilo.classList.add("animar");
		}
		setTimeout(function(){
			danilo.classList.remove("animar");
		}, 500);
	}
}

function start(){
	pause = false;
	score = 0;
	play.style.visibility = "hidden";
	carro.style.display = "block";
	carro.style.animation= "carro 1s linear infinite";
	
}

	var atingido = setInterval(function(){
		if(pause != true){
			score += 1;
			document.getElementById("score2").innerHTML = score;
			var danilotopo = parseInt(window.getComputedStyle(danilo).getPropertyValue("top"));
			var carroesquerda = parseInt(window.getComputedStyle(carro).getPropertyValue("left"));
			if(carroesquerda>200 && carroesquerda<250 && danilotopo>=130){
				carro.style.animation = "none";
				carro.style.display = "none";
				$.ajax({
					url: "includes/highscore.php",
					method: "post",
					data: { score : JSON.stringify(score)},
					success: function(res){
						console.log(res);
					}
					
				})
				pause = true;
			}
		}else{
			play.style.visibility = "visible";
		}
	}, 10);


