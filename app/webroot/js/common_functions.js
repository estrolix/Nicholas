
function isValueInArray(arr, val) {
    inArray = false;
    if(arr == null){
        return false;
    }
    for (i = 0; i < arr.length; i++)
        if (val == arr[i])
            inArray = true;
    return inArray;
}

function get_val_from_string(string, prefix){
    return string.substr(prefix.length);
}