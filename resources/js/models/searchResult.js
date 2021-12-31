export default class SearchResult {
    constructor(data) {
        this.rawData = data;
        this.title = '';
        this.released = '';
        this.runtime = '';
        this.plot = '';
        this.poster = '';
        
        this.assembleProperties();
    }

    assembleProperties() {

        console.log(this.rawData);
        this.title = this.rawData.hasOwnProperty('Title') ? this.rawData.Title : '';
        this.released = this.rawData.hasOwnProperty('Released') ? this.rawData.Released : '';
        this.runtime = this.rawData.hasOwnProperty('Runtime') ? this.rawData.Runtime : '';
        this.plot = this.rawData.hasOwnProperty('Plot') ? this.rawData.Plot : '';
        this.poster = this.rawData.hasOwnProperty('Poster') ? this.rawData.Poster : '';
    }
}