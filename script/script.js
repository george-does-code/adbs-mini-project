function getWord() {
    let searchedWord  = document.getElementById('search-field').value;
    console.log(searchedWord);
    displayWord=document.getElementById('searched-word').innerText=searchedWord;
}
