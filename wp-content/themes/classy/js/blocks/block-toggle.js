/**
 * Slide toggle blocks with adding classes to parent element and global wrapper
 * */

const blockToggle = (args) => {
    const defaults = {
        trigger: '.js-block-toggle-trigger',
        block: '.js-block-toggle-block',
        parents: '.js-block-toggle-parent',
        globalWrapper: '.js-block-toggle-global-wrapper',
        activeClass: 'is-active',
        globalActiveClass: 'is-active',
    }
    
    const options = Object.assign(defaults, args)
    const globalWrapper = $(options.globalWrapper)
    const parents = $(options.parents)
    
    if(parents.length) {
        parents.each(function (index) {
            const el = $(this)
            const block = el.find(options.block)
            const trigger = el.find(options.trigger)
            const all = el.add(block).add(trigger)
            
            block.slideUp(100)
        
            trigger.on('click', function () {
                if (block.hasClass(options.activeClass)) {
                    all.removeClass(options.activeClass)
                    block.slideUp({
                        easing: 'linear'
                    })
                }
                else {
                    all.addClass(options.activeClass)
                    block.slideDown({
                        easing: 'linear',
                        start: function () {
                            $(this).css({
                                display: "flex"
                            })
                        }
                    })
                }
    
                if (globalWrapper.length) {
                    if (globalWrapper.find(options.block).hasClass(options.activeClass)) {
                        globalWrapper.addClass(options.globalActiveClass)
                    }
                    else {
                        globalWrapper.removeClass(options.globalActiveClass)
                    }
                }
            })
        })
    }
}

export default blockToggle
