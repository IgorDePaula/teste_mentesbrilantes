class Button {
    #lamp = null;
    constructor(lamp) {
        this.#lamp = lamp;
    }

    press() {
        this.#lamp.isOn() ? this.#lamp.turnOff() : this.#lamp.turnOn();
    }
}

export default Button;
