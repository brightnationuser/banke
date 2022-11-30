const textTrimSimple = ($selector, rows, symbols) => {
    $selector.each((index, _item) => {
        
        console.log('item', _item)

        let item = $(_item)
        let text = item.text()
        let currentRows = getItemData(_item)
        let i = 1;
        
        while(currentRows > rows) {
            item.text(text.slice(0, symbols - (10 * i)) + '...')
            currentRows = getItemData(_item)
            
            i++
        }
    })
    
    function getItemData(_item) {
        let item = $(_item);
        let lh = item.css('line-height')
        let height = item.height()
        console.log('Math.ceil(height/Number(lh.replace(\'px\', \'\')))', Math.ceil(height/Number(lh.replace('px', ''))))
        return Math.ceil(height/Number(lh.replace('px', '')))
    }
}


export default textTrimSimple
