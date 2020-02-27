var bullets = [];

function Bullet(posX, posY, rotation) {
    this.radius = 10;
    this.size = createVector(this.radius, this.radius);
    this.position = createVector(posX, posY);
    this.velocity = createVector(10, 0);
    this.obstacleColor = 255;
    this.toDelete = false;
    this.speed = 10;
    this.rotation = rotation;
    
    // Displays the obstacle
    this.display = function() {
        fill(this.obstacleColor);
        stroke(0);
        ellipse(this.position.x, this.position.y, this.size.x, this.size.y);
    }
    
    // Updates the bubble's postions
    this.updatePosition = function() {
        ///////////////////////////////////////////////////////////////////////////
        // TODO: This bullet is fine for now, but I want to make it to where     //
        //       the bullet travels towards where the mouse was clicked instead  //
        //       of just in a straight line.                                     //
        ///////////////////////////////////////////////////////////////////////////
        this.position.x += cos(this.rotation/180*PI)*this.speed;
        this.position.y += sin(this.rotation/180*PI)*this.speed;
        
//        this.position.add(this.velocity);
    }
    
    this.onCanvas = function() {
        // Checks if the bullet is on the canvas
        if (this.position.x>width || this.position.x<0 || this.position.y>height || this.position.y<0) {
            return false;
        } else 
            return true;
    }
    
    // Checks for bullet/bubble collision
    this.hitsBubble = function(bubble) {
        var d = dist(this.position.x, this.position.y, bubble.x, bubble.y);       
        return (d < (this.size.x/2 + bubble.diameter/2));
    } 
    
    // Checks if the bullet hits the enemy
    this.hitsEnemy = function(enemy) {
        // Temporary variables to set edges for testing
        var testX = this.position.x;
        var testY = this.position.y;

        // Which edge is closest?
        if (this.position.x < enemy.position.x) {
            testX = enemy.position.x;
        }
        else if (this.position.x > enemy.position.x+enemy.size.x) {
            testX = enemy.position.x+enemy.size.x;
        }
        if (this.position.y < this.position.y) {
            testY = this.position.y;
        }
        else if (this.position.y > enemy.position.y+enemy.size.y) {
            testY = enemy.position.y+enemy.size.y;
        }

        // Get distance from closest edges
        var distance = dist(this.position.x, this.position.y, testX, testY)

        // Checks if the distance is less than the radius
        return (distance <= this.radius);
    }
}

function mousePressed() {
    if(character != null){
        // Calculate shooting angle
        var rotation = atan2(mouseY-character.position.y, mouseX-character.position.x) / PI*180;
        
        // Create new bullet and push into array
        var bullet = new Bullet(character.position.x, character.position.y+10, rotation);
        bullets.push(bullet);
        
        // Play shooting sound
        shoot.play();
    }
}