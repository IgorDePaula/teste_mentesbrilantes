class Glass {
    #width;
    #height;

    constructor(width, height) {
        this.#width = width;
        this.#height = height;
    }

    getWidth() {
        return this.#width;
    }

    getHeight() {
        return this.#height;
    }
}

export default Glass
