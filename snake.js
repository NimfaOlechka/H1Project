// VARIABLES
var mycanvas = document.getElementById('canvas');
var ctx = mycanvas.getContext('2d');
var snakeSize = 10;
var w = 560;
var h = 250;
var score = 0;
var snake;
var snakeSize = 10;
var food;

var drawModule = (function () { 

  var bodySnake = function(x, y) {
        ctx.fillStyle = 'green';
        ctx.fillRect(x*snakeSize, y*snakeSize, snakeSize, snakeSize);
        ctx.strokeStyle = 'darkgreen';
        ctx.strokeRect(x*snakeSize, y*snakeSize, snakeSize, snakeSize);
  }

  var pizza = function(x, y) {
        ctx.fillStyle = 'yellow';
        ctx.fillRect(x*snakeSize, y*snakeSize, snakeSize, snakeSize);
        ctx.fillStyle = 'red';
        ctx.fillRect(x*snakeSize+1, y*snakeSize+1, snakeSize-2, snakeSize-2);
  }

  // DISPLAY SCORE ON SCREEN
  var scoreText = function() {
    var score_text = "Score: " + score;
    ctx.fillStyle = 'blue';
    ctx.fillText(score_text, 10, h-5); // Display by width 10 and heigth -5
  }

  var drawSnake = function() {
      // Start body of snake
      var length = 4;
      snake = [];
      for (var i = length-1; i>=0; i--) {
          snake.push({x:i, y:0});
      }  
  }
    
  var paint = function(){
      ctx.fillStyle = 'lightgrey';
      ctx.fillRect(0, 0, w, h);
      ctx.strokeStyle = 'black';
      ctx.strokeRect(0, 0, w, h);

      // Disable button while playing
      btn.setAttribute('disabled', true);

      var snakeX = snake[0].x;
      var snakeY = snake[0].y;

      // Snake movement
      if (direction == 'right') { 
        snakeX++; }
      else if (direction == 'left') { 
        snakeX--; }
      else if (direction == 'up') { 
        snakeY--; 
      } else if(direction == 'down') { 
        snakeY++; }

    // Checks to see if player either hit the border or them self
    if (snakeX == -1 || snakeX == w/snakeSize || snakeY == -1 || snakeY == h/snakeSize || checkCollision(snakeX, snakeY, snake)) {
        // Displaying message if player lose
        alert('GAME OVER! Your Score: ' + score);

        // Send score to DB
        var saveScore = score;
        window.location.href = "snake.php?w1=" + score;
        hiddenElement.click();

        // Overwrite old file to new file instead of making a new one

        // Restart game
        btn.removeAttribute('disabled', true);

        // Clean up the map
        ctx.clearRect(0,0,w,h);
        gameloop = clearInterval(gameloop);
        return;          
    }
        
        // Add longer tail if player eats the food
        if(snakeX == food.x && snakeY == food.y) {
            var tail = {x: snakeX, y: snakeY}; // Create a new head instead of moving the tail
            score ++;
          
            createFood(); // Create new food
        } else {
            var tail = snake.pop(); // Pops out the last cell
            tail.x = snakeX; 
            tail.y = snakeY;
        }
        
        // The snake can now eat the food.
        snake.unshift(tail); // Puts back the tail as the first cell

        for(var i = 0; i < snake.length; i++) {
            bodySnake(snake[i].x, snake[i].y);
        } 
        
        pizza(food.x, food.y); 
        scoreText();
  }

  var createFood = function() {
      food = {
        x: Math.floor((Math.random() * 30) + 1),
        y: Math.floor((Math.random() * 30) + 1)
      }

      for (var i=0; i>snake.length; i++) {
        var snakeX = snake[i].x;
        var snakeY = snake[i].y;
      
        if (food.x===snakeX && food.y === snakeY || food.y === snakeY && food.x===snakeX) {
          food.x = Math.floor((Math.random() * 30) + 1);
          food.y = Math.floor((Math.random() * 30) + 1);
        }
      }
  }

  var checkCollision = function(x, y, array) {
      for(var i = 0; i < array.length; i++) {
        if(array[i].x === x && array[i].y === y)
        return true;
      } 
      return false;
  }

  var init = function(){
      direction = 'down';
      drawSnake();
      createFood();
      gameloop = setInterval(paint, 80);
  }


    return {
      init : init
    };

    
}());