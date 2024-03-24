class Stove {
    #button = null;
    #firemonth = [];
    #ovendoor = null;
    #stoveLight = [];

    addButton(button) {
        this.#button = button;
    }

    addFiremonth(firemonth) {
        this.#firemonth.push(firemonth);
    }

    addOvendoor(ovendoor) {
        this.#ovendoor = ovendoor;
    }

    addStoveLight(stoveLight) {
        this.#stoveLight.push(stoveLight)
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
