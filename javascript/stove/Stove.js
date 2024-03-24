class Stove {
    #button = null;
    #firemonth = null;
    #ovendoor = null;
    #stoveLight = null;

    addButton(button) {
        this.#button = button;
    }

    addFiremonth(firemonth) {
        this.#firemonth = firemonth;
    }

    addOvendoor(ovendoor) {
        this.#ovendoor = ovendoor;
    }

    addStoveLight(stoveLight) {
        this.#stoveLight = stoveLight;
    }

    getStoveLight() {
        return this.#stoveLight;
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
