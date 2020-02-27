// Array of bubbles
var bubbles = [];

///////////////////////////////////////////////////////////////////////////////////
// TODO: Change the separate x & y variables for position/direction/velocity/etc //
//       to use vectors instead.                                                 //
///////////////////////////////////////////////////////////////////////////////////

// Bubble object
function Bubble() {
    this.bubbleColor = 0;
    this.diameter= 50;
    this.radius = this.diameter/2;
    this.x = floor(random(0+this.radius, width-this.radius));
    this.y = floor(random(0+this.radius, height-150-this.radius));
    this.direction = [1,-1];
    this.Xdirection = random(this.direction);
    this.Ydirection = random(this.direction);
    this.Xspeed = random(1,4) * this.Xdirection;
    this.Yspeed = random(1,4) * this.Ydirection;
    this.toDelete = false;
    
    // Displays the bubble
    this.display = function() {
        stroke(150, 100, 100);
        strokeWeight(2);
        fill(this.bubbleColor);
        ellipse(this.x, this.y, this.diameter, this.diameter);
    }
    
    // Deletes the bubble
    this.pops = function () {
        this.toDelete = true;
    }
    
    // Updates the bubble's postions
    this.updatePosition = function() {
        // Check if ball is within the frame
        if (this.x-this.radius < 0 || this.x+this.radius > width)
            this.Xspeed *= -1;
        // Update X location
        this.x += this.Xspeed;
        
        // Check if ball is within the frame
        if (this.y-this.radius < 0 || this.y+this.radius > height)
            this.Yspeed *= -1;
        // Update Y location
        this.y += this.Yspeed;
    }
    
    // Checks if the bubbles collide
    this.hits = function(other) {
        var distance = dist (this.x, this.y, other.x, other.y);
        return (distance <= this.radius + other.radius);
    }
    
    // Updates the bubble's direction: called when two objects collide
    this.changeDirection = function(other) {
        //////////////////////////////////////////////////////////////////////////
        // TODO: Fix this collision resolution for the more realistic bouncing. //
        //////////////////////////////////////////////////////////////////////////
        
        if (!(this.Xdirection==other.Xdirection && this.Ydirection==other.Ydirection)) {
            if (this.Xdirection != other.Xdirection) {
                this.Xspeed *= -1;
                other.Xspeed *= -1;
            }
            if (this.Ydirection != other.Ydirection) {
                this.Yspeed *= -1;
                other.Yspeed *= -1;
            }
        } else {
            this.Xspeed *= -1;
            this.Yspeed *= -1;
        }
        
//        // This only causes the bubbles to bounce back in the opposite
//        // direction they were heading from
//        this.Xspeed *= -1;
//        this.Yspeed *= -1;
    }
    
    // Generates new random initial postitions
    this.newCoordinates = function () {
        print("newCoor");
        this.x = random(0+this.radius, width-this.radius);
        this.y = random(0+this.radius, height-this.radius);
    }
    
    // Checks if the mouse is clicked within the bubble and changes its color
    // this.clicked = function() {
    //     var distance = dist(this.x, this.y, mouseX, mouseY);
    //     if (distance<=this.radius) {
    //         this.bubbleColor = color(150, 100, 100);
    //     }
    // }
}

// This is just placeholder code that can be used for when obstacles are shot.
// Instead of changing color they can be deleted from the array and disappear.
// function mousePressed() {
//     for (var i=0; i<bubbles.length; i++) {
//         bubbles[i].clicked();
//     }
// }
