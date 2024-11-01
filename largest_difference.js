function largestDifference(arr) {
    if (!arr || arr.length < 2) {
        return 0; 
    }
    
    const maxVal = Math.max(...arr);
    const minVal = Math.min(...arr);
    
    return maxVal - minVal;
}

const arr = [3, 10, 5, 1, 9];
console.log(largestDifference(arr)); 
