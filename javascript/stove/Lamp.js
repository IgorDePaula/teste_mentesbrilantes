class Lamp {
    #on = false;
    constructor(on = false) {
        this.#on = on;
    }

    turnOn() {
        this.#on = true;
    }

    turnOff() {
        this.#on = false;
    }

    isOn() {
        return this.#on;
    }
}

export default Lamp;
