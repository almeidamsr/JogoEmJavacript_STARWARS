<html>
	<head>
		<title>matheus.sr.almeida@gmail.com - SWjogo js</title>
		<style>
			html{
		
			}
			body{
				background-size: 100% 100%;
			    background-repeat: no-repeat;
				background-image: url("../starwars/img/desertSW.gif");
				overflow-x: hidden; 
				overflow-y: hidden; <!-- pra não aparecer a barra -->
							
			}
			div#meuPersonagem{
				position: absolute;
				top: 250px;	
				left: 0px;
				width: 50px;
				height: 50px;
				<!-- background-color: black; -->
			}
			div.fixo{
					position: absolute;
					width: 50px;
					height: 50px;
					<!-- border-radius: 50%; -->
					<!-- border: 3px solid #BADA59; -->
			}
			div#raio{
				position: relative;
				bottom:5px;
				left:760px;
	        }
			div#falcon{
				position: absolute;
				top: 210px;
				left:965px;
				width: 400px;
				height: 250px;
			}
			div.objInimigo{
				color: red;
				position : absolute;
				border-radius: 50%; 
			    <!-- border: 2px solid red;  -->
				<!-- background-color: red; -->
			}
			div.menu{
				position: absolute;
				top: 2px;
				left: 900px;
				color: #52527a;
				font-size: 36;
			}
			div#base{
				position: absolute;
				top: 175px;	
				left: -100px;
			}
			div.apresentacao{
				position: absolute;
				border-radius: 10px 10px 10px 10px; 
				top: 700px;	
				left: 20px;
				background-color: #FFF;
			}
		</style>
	</head>
	
	<body onkeydown="reconhecerTeclado(event); criarCookie(valorCookie);" >
	
	<embed src="https://archive.org/download/StarWarsTheImperialMarchDarthVadersTheme/Star Wars- The Imperial March (Darth Vader's Theme).mp3" hidden="true" loop="infinite" autostart="TRUE">
	
	<embed src="http://www.sa-matra.net/sounds/starwars/Blaster-Imperial.wav" hidden="true" loop="infinite" autostart="TRUE">
	
	<embed src="http://www.sa-matra.net/sounds/starwars/Blaster-Ricochet.wav" hidden="true" loop="infinite" autostart="TRUE">
	
	<script language="JavaScript">

	    //função nao esta em uso
		function criarCookie(valorCookie){
			<!-- cria objeto Date-->
			var data = new Date();
			<!-- setando o tempo de vida do cookie -->
			data.setTime(data.getTime() + 12000000000);
			
			<!-- criando a estrutura do cookie -->
			document.cookie = "meuCookie="+valorCookie+"; expires="+data.toGMTString()+"; path=/";
			
			return "PONTOS "+valorCookie;
		}
	
		function lendoCookie(){
			return document.cookie;
		}	
	
//variaveis globais

		<!-- variaveis da funcao anda dos obetos inimigos Left -->
		
		var z = 1375;
		var l = 1375;
		var k = 1375;
		var o = 1600;
		var u = 1600;
		
		//top dos obetos
		var zy = Math.random() * 580; // letra+y = top, 580 é pra não passar da minha resolução
		var ly = Math.random() * 580; 
		var ky = Math.random() * 580; 
		var oy = Math.random() * 580; 
		var uy = Math.random() * 580; 
		
		var zydirecao = true;
		var lydirecao = true;
		var kydirecao = true;
		var oydirecao = true;
		var uydirecao = true;
		
		var count = 0;
		var zColisao = false; //se count 1 = true
		var lColisao = false; // "" etc
		var kColisao = false; 
		var oColisao = false;
		var uColisao = false;
		
		//left das paredes 
		var fixox1 = Math.random() * 760; // fixox = left, 760 largura até o raio antes da nave
		var fixox2 = Math.random() * 760;
		var fixox3 = Math.random() * 760;
		var fixox4 = Math.random() * 760;
		var fixox5 = Math.random() * 760;
		var fixox6 = Math.random() * 760;
		var fixox7 = Math.random() * 760;
		var fixox8 = Math.random() * 760;
		var fixox9 = Math.random() * 760;
		var fixox10 = Math.random() * 760;
		
		var fixoy1 = 50;
		var fixoy2 = 200;
		var fixoy3 = 250;
		var fixoy4 = 300;
		var fixoy5 = 350;
		var fixoy6 = 400;
		var fixoy7 = 450;
		var fixoy8 = 500;
		var fixoy9 = 550;
		var fixoy10 = 580;
			
		var pontos = 0;
		var vidas = 3;
		
		<!-- variaveis da funcao reconhecerTeclado do personagem -->
		var x = 0;
		var y = 250;
		var rapido = 25;
		var devagar = 5;
		var medio = 10;
		var voltarVelocidade = 20;

		//var retornar = false;
		

//---------------------------------------------------------------------------------------------------------------------
			
		function reconhecerTeclado(tcl) {
		   		   
		   var jogador = document.getElementById("meuPersonagem");
		   
		   var botaoTeclado = tcl.keyCode;
		      
			if(botaoTeclado == 37)
			{
				
				if (x>=0 && x<=1304){
					if(x<760){		<!-- antes do raio, rapido, depois do raio, devagar-->
						if(x==755){ x -= 30}
						else{x -= rapido;}						
					}else{
						x -= devagar;
					}
					if(x < 0){ x=0; } <!-- evita que ultrapasse a parede-->
					if(x > 1304){ x=1304; } <!-- '' ''-->
					if(x != 0){ pontos += 3;}
				}
				jogador.style.left = x;
				console.log('x: '+x);
				console.log('y: '+y);
				console.log('esquerda');	
			}
			if(botaoTeclado == 38)
			{
				if(y>=0 && y<= 580){
					if(x<760){
						y -= rapido;
					}else{
						y -= rapido;
					}
					if(y < 0){ y=0; }
					if(y > 575){ y=575; }
					if(y != 0){ pontos += 3;}
				}
				jogador.style.top = y;
				console.log('x: '+x);
				console.log('y: '+y);
				console.log('cima');
			}
			if(botaoTeclado == 39)
			{
				if (x>=0 && x<=1304){
					if(x<760){
						x += rapido;
						jogador.style.left = x;
					}else{
						x += devagar;
						jogador.style.left = x;
					}					
					if(x < 0){ x=0; jogador.style.left = x; } 
					if(x > 1304){ x=1304; jogador.style.left = x;}
					if(x != 1304){ pontos += 5;}					
				}
				console.log('x: '+x);
				console.log('y: '+y);
				console.log('direita');		
			}
			if(botaoTeclado == 40)
			{
				if(y>=0 && y<= 580){
					if(x<760){
						y+= rapido;
					}else{
						y+= rapido;
					}
					if(y < 0){ y=0; }
					if(y > 575){ y=575; }
					if(y != 575){ pontos +=3;}
				}
				jogador.style.top = y;
				console.log('x: '+x);
				console.log('y: '+y);
				console.log('baixo');
			}		
			<!-- quando entra na nave -->
			if(x>=997 && x<=1000 && y>=270 && y<= 353){
				//alert("voce ganhou! ou Ganhou mais uma vida!");
				vidas++;
				x = 0; 
				y = 250;
				jogador.style.left = x;
				jogador.style.top = y;
			   }

			   //verifica se o personagem colidio com a parede
				if(x<=fixox1+45 && x>=fixox1-45 && y<=fixoy1+45 && y>=fixoy1-45 ||
				   x<=fixox2+45 && x>=fixox2-45 && y<=fixoy2+45 && y>=fixoy2-45 ||
				   x<=fixox3+45 && x>=fixox3-45 && y<=fixoy3+45 && y>=fixoy3-45 ||
				   x<=fixox4+45 && x>=fixox4-45 && y<=fixoy4+45 && y>=fixoy4-45 ||
				   x<=fixox5+45 && x>=fixox5-45 && y<=fixoy5+45 && y>=fixoy5-45 ||   
				   x<=fixox6+45 && x>=fixox6-45 && y<=fixoy6+45 && y>=fixoy6-45 ||
				   x<=fixox7+45 && x>=fixox7-45 && y<=fixoy7+45 && y>=fixoy7-45 ||
				   x<=fixox8+45 && x>=fixox8-45 && y<=fixoy8+45 && y>=fixoy8-45 ||
				   x<=fixox9+45 && x>=fixox9-45 && y<=fixoy9+45 && y>=fixoy9-45 ||
				   x<=fixox10+45 && x>=fixox10-45 && y<=fixoy10+45 && y>=fixoy10-45   )
				{
					if(botaoTeclado == 37){
					  x += 25; 				
					  jogador.style.left = x;
					  jogador.style.top = y;
					}
					if(botaoTeclado == 38){
					  y += 25; 				
					  jogador.style.left = x;
					  jogador.style.top = y;
					}
					if(botaoTeclado == 39){
					  x -= 25; 				
					  jogador.style.left = x;
					  jogador.style.top = y;
					}
					if(botaoTeclado == 40){
					  y -= 25; 				
					  jogador.style.left = x;
					  jogador.style.top = y;
					}
				}
			   
			// document.getElementById("pontos").innerHTML = criarCookie(pontos) +" VIDAS "+vidas;
		}

//--------------------------------------------------------------------------------------------------------------------------------
		
			function anda() {
				if(x==0 && y==250){
					//na posição inicial não perde vida e não ganha pontos
				}else{
					pontos++;
				}
				var menu = document.getElementById("pontos").innerHTML = "PONTOS "+pontos+" VIDAS "+vidas;
				
				var jogador = document.getElementById("meuPersonagem");
				
				var objInimigo1 = document.getElementById("objInimigo1");
				var objInimigo2 = document.getElementById("objInimigo2");
				var objInimigo3 = document.getElementById("objInimigo3");
				var objInimigo4 = document.getElementById("objInimigo4");
				var objInimigo5 = document.getElementById("objInimigo5");
				
				var parede1 = document.getElementById("parede1");
				var parede2 = document.getElementById("parede2");
				var parede3 = document.getElementById("parede3");
				var parede4 = document.getElementById("parede4");
				var parede5 = document.getElementById("parede5");
				var parede6 = document.getElementById("parede6");
				var parede7 = document.getElementById("parede7");
				var parede8 = document.getElementById("parede8");
				var parede9 = document.getElementById("parede9");
				var parede10 = document.getElementById("parede10");
				
				//zy = Math.random() * 580; //se descomentar isso daqui, fica bem mais embaralhado
				//ly = Math.random() * 580;
				//ky = Math.random() * 580;
				//oy = Math.random() * 580;
				//uy = Math.random() * 580;
			
				//verifica no intervalo se o personagem colidiu com o objeto, o x as letras unicas representam o left
				// o y e as letras+y representam o top
				if(x<=z+100 && x>=z-45 && y<=zy+25 && y>=zy-25 ||
				   x<=l+100 && x>=l-45 && y<=ly+25 && y>=ly-25 ||
				   x<=k+100 && x>=k-45 && y<=ky+25 && y>=ky-25 ||
				   x<=o+100 && x>=o-45 && y<=oy+25 && y>=oy-25 ||
				   x<=u+100 && x>=u-45 && y<=uy+25 && y>=uy-25  )
				{
					//caso ele não esteja na posição inicial 
					if(x==0 && y==250){
						//na posição inicial não perde vida e não ganha pontos
					}else{
					   x = 0; 
					   y = 250;
					   jogador.style.left = x;
					   jogador.style.top = y;
					   vidas--;
					   count++;
					   //5000 para o obijeto inimigo sair da tela
					   if(count == 1){ zColisao = true; z=5000;}
					   if(count == 2){ lColisao = true; l=5000;}
					   if(count == 3){ kColisao = true; k=5000;}
					   if(count == 4){ oColisao = true; o=5000;}
					   if(count == 5){ 
							console.log("Você zerou o Jogo !! Parabéns SEU RECORD : "+pontos+" PONTOS");
							uColisao = true; u=5000; alert("Você zerou o Jogo !! Parabéns SEU RECORD : "+pontos+" PONTOS"); location.reload();							
						}
					}
					if(vidas == 0){
						vidas = 0;
						console.log("FIM DE JOGO! SEU RECORD DE SOBREVIVENCIA É"+pontos+" PONTOS");
						alert("FIM DE JOGO! SEU RECORD DE SOBREVIVENCIA É "+pontos+" PONTOS");
						location.reload();
					}
				}
					
			
		//verifica se o personagem colidio com a parede na posição inicial pra caso fique uma parede em cima do personagem 
		//0 e 250 sao o left e top inicial
		if(0<=fixox1+45 && 0>=fixox1-45 && 250<=fixoy1+45 && 250>=fixoy1-45 ||
		   0<=fixox2+45 && 0>=fixox2-45 && 250<=fixoy2+45 && 250>=fixoy2-45 ||
		   0<=fixox3+45 && 0>=fixox3-45 && 250<=fixoy3+45 && 250>=fixoy3-45 ||
		   0<=fixox4+45 && 0>=fixox4-45 && 250<=fixoy4+45 && 250>=fixoy4-45 ||
		   0<=fixox5+45 && 0>=fixox5-45 && 250<=fixoy5+45 && 250>=fixoy5-45 ||   
		   0<=fixox6+45 && 0>=fixox6-45 && 250<=fixoy6+45 && 250>=fixoy6-45 ||
		   0<=fixox7+45 && 0>=fixox7-45 && 250<=fixoy7+45 && 250>=fixoy7-45 ||
		   0<=fixox8+45 && 0>=fixox8-45 && 250<=fixoy8+45 && 250>=fixoy8-45 ||
		   0<=fixox9+45 && 0>=fixox9-45 && 250<=fixoy9+45 && 250>=fixoy9-45 ||
		   0<=fixox10+45 && 0>=fixox10-45 && 250<=fixoy10+45 && 250>=fixoy10-45   )
		{
			location.reload();
		}else{
				var movVertical = 25;
				
				if(zColisao == false){
					if(z <= 1375 && z >= -250){
						z = z - 50;
						if(z >=1300){zy = Math.random() * 580;}
						//para o obeto ficar balançando na tela. o zy recebe o valor dele mais o movVertical No final o o zy é "zerado" retorna
						<!-- if(zydirecao == true){ -->
							<!-- zy += movVertical; -->
							<!-- zydirecao = false; -->
						<!-- }else{ -->
							<!-- zy -= movVertical; -->
							<!-- zydirecao = true; -->
						<!-- } -->
					}else{
						z = 1375;
					}
				}
				if(lColisao == false){
					if(l <= 1375 && l >= -250){
						l = l - 45;
						if(l >=1300){ly = Math.random() * 580;}
						<!-- if(lydirecao == true){ -->
							<!-- ly += movVertical; -->
							<!-- lydirecao = false; -->
						<!-- }else{ -->
							<!-- ly -= movVertical; -->
							<!-- lydirecao = true; -->
						<!-- } -->
					}else{
						l = 1375
					}
				}
				if(kColisao == false){
					if(k <= 1375 && k >= -250){
						k = k - 25;
						if(k >=1300){ky = Math.random() * 580;}
						<!-- if(kydirecao == true){ -->
							<!-- ky += movVertical; -->
							<!-- kydirecao = false; -->
						<!-- }else{ -->
							<!-- ky -= movVertical; -->
							<!-- kydirecao = true; -->
						<!-- } -->
					}else{
						k = 1375;
					}
				}
				if(oColisao == false){
					if(o <= 1600 && o >= -250){
						o = o - 50;
						if(o >=1300){oy = Math.random() * 580;}
						<!-- if(oydirecao == true){ -->
							<!-- oy += movVertical; -->
							<!-- oydirecao = false; -->
						<!-- }else{ -->
							<!-- oy -= movVertical; -->
							<!-- oydirecao = true; -->
						<!-- } -->
					}else{
						o = 1375;
					}
				}
				if(uColisao == false){
					if(u <= 1600 && u >= -250){
						u = u - 25;
						if(u >=1300){uy = Math.random() * 580;}
						<!-- if(uydirecao == true){ -->
							<!-- uy += movVertical; -->
							<!-- uydirecao = false; -->
						<!-- }else{ -->
							<!-- uy -= movVertical; -->
							<!-- uydirecao = true; -->
						<!-- } -->
					}else{
						u = 1375;
					}
				}
				
				objInimigo1.style.left = z; 
                objInimigo2.style.left = l; 
				objInimigo3.style.left = k; 
				objInimigo4.style.left = o; 
				objInimigo5.style.left = u; 
				
			    objInimigo1.style.top = zy; 
                objInimigo2.style.top = ly; 
			    objInimigo3.style.top = ky; 
			    objInimigo4.style.top = oy; 
				objInimigo5.style.top = uy; 
				
				parede1.style.left = fixox1; 
                parede2.style.left = fixox2; 
				parede3.style.left = fixox3; 
				parede4.style.left = fixox4; 
				parede5.style.left = fixox5;
				parede6.style.left = fixox6; 
                parede7.style.left = fixox7; 
				parede8.style.left = fixox8; 
				parede9.style.left = fixox9; 
				parede10.style.left = fixox10;
				
				parede1.style.top = fixoy1; 
                parede2.style.top = fixoy2; 
				parede3.style.top = fixoy3; 
				parede4.style.top = fixoy4; 
				parede5.style.top = fixoy5;
				parede6.style.top = fixoy6; 
                parede7.style.top = fixoy7; 
				parede8.style.top = fixoy8; 
				parede9.style.top = fixoy9; 
				parede10.style.top = fixoy10;
				
				//coloca o valor inicial para o obijeto subir e decer
				<!-- zy = zyInicial; -->
				<!-- ly = lyInicial; -->
				<!-- ky = kyInicial; -->
				<!-- oy = oyInicial; -->
				<!-- uy = uyInicial; -->		
		}
	}

			setInterval(function() { anda() }, 35);
	</script>
	
<!-- <div id="base">
	<img class="image" id="imgbase" src="http://www.chavefacil.com.br/site/imagens/geral/ico-carregamento.gif" alt="Smiley face" height="200" width="250">
</div> -->
<div id="meuPersonagem">

	<img class="image" id="corpoPersonagem" src="../starwars/img/BB8desenhado.png" alt="Smiley face" height="50" width="50">

</div>
		<div id="raio">
		<img class="image" id="raio" src="../starwars/img/raio.png" alt="Smiley face" height="650">
		</div>
		
		<div id="falcon">
		<img class="image" id="falcon" src="../starwars/img/falcon.png" alt="Smiley face" width="400" height="250">
		</div>
		<div class="menu">
			 <p id="pontos" > </p>
		</div>
		<div class="apresentacao">
			 <p id="meuNome" > &nbsp; by Matheus Santos Rocha Almeida &nbsp;  matheus.sr.almeida@gmail  <span style="font-size:12px;"> &nbsp; Imagens obitidas da internet através do buscador google &nbsp;</span></p>	
		</div>
		<div class="objInimigo" id="objInimigo1"><img class="image" id="obj1" src="../starwars/img/tiiro.png" alt="Smiley face" height="50"></div>
		<div class="objInimigo" id="objInimigo2"><img class="image" id="obj2" src="../starwars/img/tiiro.png" alt="Smiley face" height="50"></div></div>
		<div class="objInimigo" id="objInimigo3"><img class="image" id="obj3" src="../starwars/img/tiiro.png" alt="Smiley face" height="50"></div>
		<div class="objInimigo" id="objInimigo4"><img class="image" id="obj4" src="../starwars/img/tiiro.png" alt="Smiley face" height="50"></div>
		<div class="objInimigo" id="objInimigo5"><img class="image" id="obj1" src="../starwars/img/tiiro.png" alt="Smiley face" height="50"></div>
		
		<div id="parede1" class="fixo">  <img class="image" id="pedra1" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
		<div id="parede2" class="fixo">	 <img class="image" id="pedra2" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
		<div id="parede3" class="fixo">	 <img class="image" id="pedra3" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
		<div id="parede4" class="fixo">	 <img class="image" id="pedra4" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	    <div id="parede5" class="fixo">	 <img class="image" id="pedra5" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	    <div id="parede6" class="fixo">	 <img class="image" id="pedra6" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	    <div id="parede7" class="fixo">	 <img class="image" id="pedra7" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div> 
	    <div id="parede8" class="fixo">	 <img class="image" id="pedra8" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	    <div id="parede9" class="fixo">	 <img class="image" id="pedra9" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	    <div id="parede10" class="fixo"><img class="image" id="pedra10" src="../starwars/img/pedra.png" alt="Smiley face" height="50" width="50"></div>
	</body>
</html>