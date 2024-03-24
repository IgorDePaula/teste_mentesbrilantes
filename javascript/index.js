import {Stove, Glass, Firemouth, StoveLighter, Lamp, OvenDoor, Button} from './stove/index.js';

const glass = new Glass();

const stove = new Stove();

const lamp = new Lamp();

const ovenDoor = new OvenDoor(glass);

const button = new Button(lamp);

stove.addButton(button);
stove.addOvendoor(ovenDoor);

stove.addFiremonth(new Firemouth('up left'));
stove.addFiremonth(new Firemouth('up right'));
stove.addFiremonth(new Firemouth('down left'));
stove.addFiremonth(new Firemouth('down right'));

stove.addStoveLight(new StoveLighter('blue', 'up left'));
stove.addStoveLight(new StoveLighter('yellow', 'up right'));
stove.addStoveLight(new StoveLighter('red', 'down left'));
stove.addStoveLight(new StoveLighter('pink', 'down right'));
stove.addStoveLight(new StoveLighter('green', 'ovendoor'));
