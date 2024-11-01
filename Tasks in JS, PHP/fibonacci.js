function fibonacciSequence(n) {
    const store = new Map();
    
    function fibonacci(number) {
        if (number <= 1) return number;
        
        
        if (store.has(number)) {
            return store.get(number);
        }
        
       
        const result = fibonacci(number - 1) + fibonacci(number - 2);
        store.set(number, result);
        
        return result;
    }
    
    
    const sequence = [];
    for (let i = 0; i < n; i++) {
        sequence.push(fibonacci(i));
    }
    
    return sequence;
}


console.log(fibonacciSequence(10));
