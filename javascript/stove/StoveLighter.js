class StoveLighter {
    #color = '';

    constructor(color) {
        this.#color = color;
    }

    getColor() {
        return this.#color
    }
}

export default StoveLighter
