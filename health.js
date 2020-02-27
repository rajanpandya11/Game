// Character health
var health;
var playAgain;

// Health object
function Health() {
    this.size = createVector(102, 25);
    this.position = createVector(20, 20);
    this.healthColor = color(150, 0, 0);
    this.health = 99;
    this.invul = false; // Invulnerability after being hit
    this.invulTime = 70; // How long you are invulnerable
    this.invulCounter = 0;
    
    // Displays the health bar
    this.display = function() {
        fill(bgColor);
        stroke(0);
        rect(this.position.x, this.position.y, this.size.x, this.size.y);
        fill(this.healthColor);
        noStroke();
        rect(this.position.x+1, this.position.y+1, this.health, this.size.y-2);
    }
    
    // Updates the character's health %
    this.updateHealth = function() {
        for (var i=0; i<bubbles.length; i++) {
            if (character != null && character.hits(bubbles[i])) {
                if (!this.invul) {
                    this.invul = true;
                    this.health -= 33;
                    playerHit.play();
                }
            } 
        }
        
        // Count invulnerability
        if (this.invul){
            if (this.invulCounter==this.invulTime) {
                this.invul = false;
                this.invulCounter = 0;
            } else {
                if (this.invulCounter%5 == 0)
                    this.healthColor = color(100, 0, 50);
                else
                    this.healthColor = color(150, 0, 0);
                this.invulCounter++;
            }
            
            // Make player flash when invulnerable
            if (this.invulCounter%10 == 0 && character!=null)
                character.flash();
        }
            
        
        // Checks if health is 0 and player should die
        if (this.health==0) {
            this.health = 0;
            if (character != null) {
                character.die();
                gameOver = "Game Over";
                saveScores();                        
                gameOverSound.play(null, null, 3, null, null);
            }
        }
    }
}
