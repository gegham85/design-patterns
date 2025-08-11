class Singleton {
  static #instance = null; // Private static field

  // The constructor is private-like, but not truly private
  constructor() {
    if (Singleton.#instance) {
      // Prevent direct instantiation by throwing an error
      throw new Error("You can only create one instance!");
    }
    // Logic for your singleton object
  }

  static getInstance() {
    if (this.#instance === null) {
      this.#instance = new Singleton();
    }
    return this.#instance;
  }
}

// Usage
const instance1 = Singleton.getInstance();

try {
  const instance2 = new Singleton(); // This will throw an error
} catch (e) {
  console.error(e.message); // "You can only create one instance!"
}
