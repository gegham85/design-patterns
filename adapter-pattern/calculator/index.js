// The Adaptee: The old, incompatible object
class OldCalculator {
  operate(operator, num1, num2) {
    if (operator === '+') {
      return num1 + num2;
    } else if (operator === '-') {
      return num1 - num2;
    }
  }
}

// The Target Interface (conceptually defined by the client)
// The client expects an object with add() and subtract() methods.

// The Adapter: It wraps the old object and translates its interface
class CalculatorAdapter {
  constructor() {
    this.oldCalculator = new OldCalculator();
  }

  add(num1, num2) {
    console.log("Adapter: Translating 'add' to old calculator's 'operate'...");
    return this.oldCalculator.operate('+', num1, num2);
  }

  subtract(num1, num2) {
    console.log("Adapter: Translating 'subtract' to old calculator's 'operate'...");
    return this.oldCalculator.operate('-', num1, num2);
  }
}

// The Client: Uses the new, compatible interface
function useNewCalculator(calculator) {
  const resultAdd = calculator.add(10, 5);
  console.log(`Result of add: ${resultAdd}`);
  
  const resultSubtract = calculator.subtract(10, 5);
  console.log(`Result of subtract: ${resultSubtract}`);
}

// --- Usage ---
const adapter = new CalculatorAdapter();
useNewCalculator(adapter);