// Character
var character;

// Character object
function Character() {
    this.size = createVector(20, 50);
    this.position = createVector(50, height-50);
    this.velocity = createVector(0, 0);
    this.acceleration = createVector(0, 0);
    this.characterColor = 130;
    this.toDelete = false;
    
    // Displays the character
    this.display = function() {
        fill(this.characterColor, 200);
        stroke(this.characterColor);
        rect(this.position.x, this.position.y, this.size.x, this.size.y);
    }
    
    // Makes the character flash when hit
    this.flash = function() {
        if (this.characterColor==130)
            this.characterColor = 255;
        else if (this.characterColor==255)
            this.characterColor = 130;
    }
    
    // Checks if the character is hit by the bubble
    this.hits = function (bubble) {
        // Temporary variables to set edges for testing
        var testX = bubble.x;
        var testY = bubble.y;

        // Which edge is closest?
        if (bubble.x < this.position.x) {
            testX = this.position.x;
        }
        else if (bubble.x > this.position.x+this.size.x) {
            testX = this.position.x+this.size.x;
        }
        if (bubble.y < this.position.y) {
            testY = this.position.y;
        }
        else if (bubble.y > this.position.y+this.size.y) {
            testY = this.position.y+this.size.y;
        }

        // Get distance from closest edges
        var distance = dist(bubble.x, bubble.y, testX, testY)

        // Checks if the distance is less than the radius
        return (distance <= bubble.diameter/2);
    }
    
    // Updates the character
    this.updatePosition = function() {
        this.velocity.add(this.acceleration);
        this.position.add(this.velocity);
        this.acceleration.set(0, 0);
    }
    
    // Applies a force to the character
    this.applyForce = function(force) {
        this.acceleration.add(force);
    }
    
    // Controls character movement
    this.checkMovement = function() {
        if (keyIsDown(65)) { // Move left
            var left = createVector(-4, 0);
            this.position.add(left);
        }
        if (keyIsDown(68)) { // Move right
            var right = createVector(4, 0);
            this.position.add(right);
        }
        if (keyIsDown(83)) {
            var down = createVector(0, 4);
            this.position.add(down);
        }
    }
    
    // Checks the edges of the character and adjusts their position
    this.checkEdges = function() {
        // Checks if the character is touching the floor and keeps them from
        // falling through it
        if (this.position.y > height-50) {
            this.velocity.y *= 0;
            this.position.y = height-50;
        }
        
        // Checks if the character has hit the sides of the canvas and keeps
        // them from moving off-screen
        if (this.position.x < 0) {
            this.velocity.x *= 0;
            this.position.x = 0;
        }
        if (this.position.x > width-this.size.x) {
            this.velocity.x *= 0;
            this.position.x = width-this.size.x;
        }
    }
    
    // Deletes the character
    this.die = function() {
        this.toDelete = true;
    }
    
    // Checks if the character is dead
    this.checkIfDead = function() {
        if (character != null && character.toDelete) {
            character = null;
        }
    }
}

// Controls character jumping
function keyPressed() {
    if(key==' ' && character.position.y==height-50 && !keyIsDown(87) && character!=null) { // Jump
        var jump = createVector(0, -5);
            character.applyForce(jump);
    }
    if (keyIsDown(87) && character.position.y==height-50 && key!=' ' && character!=null) { // Alternate jump
            var jump = createVector(0, -5);
            character.applyForce(jump);
    }
}