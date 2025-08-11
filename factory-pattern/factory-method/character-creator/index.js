// Product Interface and Concrete Products
class Character {
  constructor(name, health, weapon) {
    this.name = name;
    this.health = health;
    this.weapon = weapon;
  }
  attack() {
    console.log(`${this.name} attacks with their ${this.weapon}.`);
  }
}

class Warrior extends Character {
  constructor(name, health) {
    super(name, health, "sword");
  }
}

class Mage extends Character {
  constructor(name, health) {
    super(name, health, "staff");
  }
}

// Creator Abstract Class and Concrete Creators
class CharacterFactory {
  createCharacter(name) {
    // This method is the factory method.
    // Subclasses must implement this.
    throw new Error("createCharacter() must be implemented.");
  }
}

class WarriorFactory extends CharacterFactory {
  createCharacter(name) {
    // This is the complex creation logic.
    // The factory sets the default health for a Warrior.
    const health = 150;
    console.log(`Building a Warrior with ${health} health...`);
    return new Warrior(name, health);
  }
}

class MageFactory extends CharacterFactory {
  createCharacter(name) {
    // This factory sets a different default health for a Mage.
    const health = 100;
    console.log(`Building a Mage with ${health} health...`);
    return new Mage(name, health);
  }
}

// Client Code
function createAndPlayCharacter(factory, name) {
  const character = factory.createCharacter(name);
  character.attack();
}



// --- Usage ---
const warriorFactory = new WarriorFactory();
createAndPlayCharacter(warriorFactory, "Gimli");

console.log("");

const mageFactory = new MageFactory();
createAndPlayCharacter(mageFactory, "Gandalf");