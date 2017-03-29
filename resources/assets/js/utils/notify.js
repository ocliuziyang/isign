var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25}

export function show_stack_bottomright(type, title='title', text='text') {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-bottomright",
        stack: stack_bottomright,
        delay: 2400,
        closer: true,
        hide: true,
    };
    opts.title = title;
    opts.text = text;
    switch (type) {
        case 'error':
            opts.type = "error";
            break;
        case 'info':
            opts.type = "info";
            break;
        case 'success':
            opts.type = "success";
            break;
    }
    new PNotify(opts);
}

PNotify.prototype.options.styling = "fontawesome";


