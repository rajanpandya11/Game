
var bgColor = 50; // Background color
var myCamera; // myCamera translation
var points = 0;
var currentLevel = 1;
var someSound;
var gameOverSound;
var winGame;
var shoot;
var playerHit;
var gameOver = "";
var EOG = false;
var hit = false;
var playTime = 0;
var throwMoreBubbles = 1;

setInterval(setTime, 1000);

function preload() {
    someSound = loadSound("sounds/bubblePop.mp3");
    enemyDeath = loadSound("sounds/Death_01.wav");
    gameOverSound = loadSound("sounds/GameOver.wav");
    winGame = loadSound("sounds/winGame.mp3");
    shoot = loadSound("sounds/shoot.wav");
    playerHit = loadSound("sounds/playerHit.wav")
    enemyHit = loadSound("sounds/enemyHit.wav");
}

function setup() {
    docWidth = document.body.clientWidth;
    docHeight = document.body.clientHeight;
    //createCanvas(docWidth, 400);
    createCanvas(1200, 600);
    myCamera = createVector(0, 0);
    
    
    // Create bubbles
    var numBubbles = random(1,6);
    for (var i=0; i<numBubbles; i++) {
        // Make a bubble for each array index
        bubbles[i] = new Bubble();
        // Check if the new bubble will intersect with another existing bubble
    //     for (var j=0; j<bubbles.length; j++) {
    //         // Create new starting coordinates until there are no collisions
    //         while (i!=j && bubbles[i].hits(bubbles[j])) {
    //             bubbles[i].newCoordinates();
    //         }
    //     }
    }
    // // Create obstacles
    // for (var i=0; i<4; i++) {
    //     // Make an obstacle for each array index
    //     obstacles[i] = new Obstacle();
    // }
    // obstacle = new Obstacle();
        
    // Create enemy
    enemy = new Enemy();
    
    
    // Create health
    health = new Health();
    // Create character
    character = new Character();
    //cnv.mousePressed(shootBullet);
    // socket = io.connect('http://139.62.210.151/~group6/cop4813:3000');
    // playAgain.mousePressed(saveScores);
}


function saveScores() {
    $.ajax({
        type: 'POST',
        url: "savePoints.php",
        data: 'points=' + points + '&level=' + currentLevel,
        // done: function (data) {            
        //     alert(data);            
        // },
        success: function(data){
            //alert('you win');            
        },
        fail: function (e) {
            alert('Error: ' + e);
        }
    });    
}


function draw() {
    background(bgColor);

    // Sets myCamera translation to a continuous speed
    // translate(myCamera.x, myCamera.y);
    // myCamera.x--;
    
    // if(bubbles.length < random([1,2,3,4,5,6])){
    //     var numBubbles = random(2,6);
    //     var oldLength = bubbles.length;
    //     for (var i=0; i<numBubbles; i++) {
    //     // Make a bubble for each array index
    //         bubbles[ oldLength + i ] = new Bubble();
    //     }
    // }
    
    // Displays and updates bubbles
    for (var i=0; i<bubbles.length; i++) {
        if (bubbles[i].toDelete) {
            bubbles.splice(i, 1);
        } else {
            bubbles[i].display();
            bubbles[i].updatePosition();
            // for (var j=i+1; j<bubbles.length; j++) {
                // if (bubbles[i].hits(bubbles[j])) {
                    // bubbles[i].changeDirection(bubbles[j]);
                // }
            // }
        }        
    }
    
    
    // Displays and updates obstacles
    // obstacle.display();
    
    
    // Displays and updates bullet
    for (var i=0; i<bullets.length; i++) {
        if (bullets[i].onCanvas() && !bullets[i].toDelete) {
            bullets[i].updatePosition();
            bullets[i].display();
            if(enemy != null) {
                if (bullets[i].hitsEnemy(enemy)) {
                    bullets[i].toDelete = true;
                    enemyHit.play();
                    enemy.flash();
                    // enemy.health -= 4;
                    points += 10;
                    // if (enemy.health==0){
                    //     enemy.die();
                    //     character.die();                        
                    // }
                }
            }
            for (var j = 0; j < bubbles.length; j++) {
                if (bullets[i].hitsBubble(bubbles[j])) {
                    bullets[i].toDelete = true;
                    bubbles[j].pops();
                    someSound.play(null, null, 3, null, null);
                    // points += 2;
                }
            }
        }
    }
    
    
    // Displays and updates character's health
    health.display();
    health.updateHealth();
    
    
    
    // Create and apply gravity to the character
    var gravity = createVector(0, 0.1);
    
    
    // Displays and updates character
    if (character != null) {
        character.applyForce(gravity);
        character.updatePosition();
        character.checkMovement();
        character.checkEdges();
        character.display();
        character.checkIfDead();
    }
        

    // if(enemy != null) {
        enemy.display();
        enemy.update();
        // enemy.checkIfDead();
    // }   
    
    // Displays the reticle
    stroke(255);
    noFill();
    ellipse(mouseX, mouseY-0.5, 11, 11); // Center
    rect(mouseX-10, mouseY-0.5, 4, 1);   // Left
    rect(mouseX+6, mouseY-0.5, 4, 1);    // Right
    rect(mouseX-0.5, mouseY-10, 1, 4);   // Top
    rect(mouseX-0.5, mouseY+6, 1, 4);    // Bottoma
    
    var s = "Points: " + points;
    textSize(32);
    fill(255);
    text(s, 1000, 50);

    textSize(100);
    fill(250, 0, 0);
    text(gameOver, 400, 200);

    textSize(32);
    fill(255);
    text('timer:', 600, 50);

    textSize(32);
    fill(255, 0, 0);
    text(playTime, 700, 50);    

}

function setTime() {
    if(character!=null ){
        playTime += 1;
        var oldLength = bubbles.length;
        var two = playTime % 2;        
        var three = playTime % 3;        
        var four = playTime % 4;        
        var five = playTime % 5;        
        var ten = playTime % 10;        
        var con1 = (two == 0 && three == 0 && four == 0 && five == 0 && ten == 0);
        var con2 = (two == 0 && four == 0 && five == 0 && ten == 0);
        var con3 = (three == 0 && four == 0 && five == 0 && ten == 0);
        var con4 = (two == 0 && three == 0);
        var con5 = (four == 0 && five == 0 && ten == 0);
        if(five == 0){
            currentLevel += 1;
        }    
        if(con1){
            oldLength = addThem(10, oldLength);
        }
        else if(con2 || con3){
            oldLength = addThem(5, oldLength);
        }
        else if(con4 || con5){
            oldLength = addThem(3, oldLength);
        }
        while(oldLength < 5){
            bubbles[ oldLength ] = new Bubble();
            oldLength = bubbles.length;
        }

    }
}

function addThem(value, oldLength){
    var i =0;
    while(i<3){
        bubbles[ oldLength + i] = new Bubble();
        i++;
    }
    return bubbles.length;                    
}