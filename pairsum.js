function findPairs(arr, target) {
    const pairs = [];
    const seen = new Set();

    for (let num of arr) {
        const complement = target - num;
        
        if (seen.has(complement)) {
            pairs.push([num, complement]);
        }
        seen.add(num);
    }
    return pairs;
}


const arr = [1, 2, 3, 4, 5, 6, 7, 8];
const target = 9;

const pairs = findPairs(arr, target);

console.log(`Target: ${target}`);
console.log("Pairs:", pairs);
