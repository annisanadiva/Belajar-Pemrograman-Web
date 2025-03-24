const kalkulator = (operator, ...values) => {
    switch (operator) {
        case '+':
            return values.reduce((a, b) => a + b);
        case '-':
            return values.reduce((a, b) => a - b);
        case '*':
            return values.reduce((a, b) => a * b);
        case '/':
            return values.reduce((a, b) => a / b);
        case '%':
            return values.reduce((a, b) => a % b);
        default:
            return 'Operator tidak valid';
    }
};

console.log(kalkulator('+', 15, 20, 10));
console.log(kalkulator('-', 50, 22, 5));
console.log(kalkulator('*', 2, 3, 2));
console.log(kalkulator('/', 100, 5, 4));
console.log(kalkulator('%', 19, 5));