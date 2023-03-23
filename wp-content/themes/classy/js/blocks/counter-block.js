const counterBlock = (items) => {
    const $items = $(items);

    $items.each(function(){
        let ths = $(this);

        const animate = () => {
            const value = +parseInt(ths.data("number"));
            let data = +parseInt(ths.text());
            const not_numbers = ths.data("number").toString().replace(/[0-9]/g, '');
            const time = value / 200;

            if (data < value) {
                ths.text(Math.ceil(data + time)+not_numbers);
                setTimeout(animate, 1);
            } else {
                ths.text(value+not_numbers);
            }
        }
        animate()
    })

};

export default counterBlock;