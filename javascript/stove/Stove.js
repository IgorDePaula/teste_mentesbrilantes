class Stove {
    #button = null;
    #firemonth = null;
    #ovendoor = null;

    constructor(button, firemonth, ovendoor) {
        this.#button = button;
        this.#firemonth = firemonth;
        this.#ovendoor = ovendoor;
    }

    getButton() {
        return this.#button;
    }

    getFiremonth() {
        return this.#firemonth;
    }

    getOvendoor() {
        return this.#ovendoor;
    }
}

export default Stove;
