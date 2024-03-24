class StoveLighter {
    #color = '';
    #position = '';

    constructor(color, position) {
        this.#color = color;
        this.#position = position;
    }

    getPosition() {
        return this.#position;
    }

    getColor() {
        return this.#color
    }
}

export default StoveLighter
