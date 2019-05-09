export default class Infobox {
  constructor(id) {
    this.block = document.getElementById(id);
    this.visible = false;
  }

  show() {
    this.block.className = 'infobox-w';

    return this; 
  }

  hide() {
    this.block.className = 'infobox-w hidden';

    return this;
  }
    
}
