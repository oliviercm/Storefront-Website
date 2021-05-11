-- WARNING: This script is destructive! Running this script will destroy and recreate the database for the storefront app.
DROP DATABASE IF EXISTS storefront;
CREATE DATABASE storefront;
USE storefront;
CREATE TABLE user(
    id INT NOT NULL AUTO_INCREMENT,
    email NVARCHAR(255) NOT NULL UNIQUE,
    name NVARCHAR(255) NOT NULL,
    created_at NOT NULL DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
CREATE TABLE user_password(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    hash NVARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE user_preference(
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    email_newsletter_subscribed BOOLEAN NOT NULL,
    email_promotions_subscribed BOOLEAN NOT NULL,
    email_reminders_subscribed BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE product(
    id INT NOT NULL AUTO_INCREMENT,
    name NVARCHAR(255) NOT NULL,
    image VARCHAR(2048) NOT NULL,
    rating INT NOT NULL,
    stock INT NOT NULL,
    price INT NOT NULL,
    discount_price INT,
    description JSON NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO product VALUES
    (
        default,
        'Masks (50 ct)',
        'product1.png',
        4,
        100,
        1899,
        NULL,
        '[
            "Suitable for offices, schools, and outdoors.",
            "Made of 3 ply layers and premium non woven fabric, blocking and filtering small particles in the air.",
            "This face mask is designed with an adjustable elastic ear loop.",
            "Breathable, soft and comfortable, gentle to skin.",
            "Disposable masks: 50pc face masks."
        ]'
    ),
    (
        default, 
        'Germ-X Hand Sanitizer (8 fl oz.)',
        'product2.png',
        4,
        15,
        699,
        NULL,
        '[
            "Kills 99.99% of many common harmful germs and bacteria in as little as 15 seconds.",
            "Great alternative when soap and water are not available.",
            "Moisturizing with Vitamin E.",
            "Sooths and Moisturizes.",
            "Subtle and Refreshing Fragrance."
        ]'
    ),
    (
        default, 
        'Nitrile Gloves (100 ct)',
        'product3.png',
        4,
        100,
        2699,
        NULL,
        '[
            "The ideal solution for individuals sensitive to natural rubber latex and donning powder.",
            "Comfortable fit with textured fingertips for excellent tactile sensitivity.",
            "Extraordinary strength, stretchable durability and puncture resistance with premium iris blue color.",
            "Commonly used by law enforcement professionals, tattoo artists, physicians and first responders.",
            "Features smooth external finish and beaded cuff for extra durability."
        ]'
        ),
    (
        default, 
        'Sanitizer Wipes (3 boxes)',
        'product4.png',
        4,
        100,
        1199,
        NULL,
        '[
            "Clorox Disinfecting Wipes are proven to kill COVID-19 Virus in 30 seconds; cleans and kills 99.9% of viruses and bacteria with powerful, triple-layered wipe.",
            "New easy to pull flip top pack allows for the easiest way to clean and disinfect: open with 1 hand dispenses 1 wipe at a time.",
            "Germs and messes occur on more than kitchen counters and bathroom surfaces, conveniently tackle any tough surface including finished wood sealed granite and stainless steel.",
            "Easy to stack space saving pack allows you to take Clorox Disinfecting wipes anywhere including on the go.",
            "Disinfect and deodorize with the fresh smell of Clorox disinfecting wipes for a bleach-free, all-in-1 cleaning alternative. Safely wipe down toys, remotes, or clean up car spills with these sanitizing wipes."
        ]'
    ),
    (
        default, 
        'Ivory Soap (4 pc)',
        'product5.png',
        5,
        100,
        999,
        NULL,
        '[
            "Made with pure and purposeful ingredients.",
            "Is perfect for your family. Great for hands, face and body.",
            "Free of Sulfates, parabens, heavy perfumes and dyes."
        ]'
    ),
    (
        default, 
        'Band-aids Assorted',
        'product6.png',
        4,
        100,
        699,
        NULL,
        '[
            "Band-Aid Brand Flexible Fabric Adhesive Bandages for first aid and wound protection of minor wounds, cuts, scrapes and burns.",
            "Made with Memory-Weave fabric for comfort and flexibility, these bandages stretch, bend, and flex with your skin as you move, and include a Quilt-Aid comfort pad designed to cushion painful wounds which may help prevent reinjury.",
            "These Band-Aid Brand Flexible Fabric adhesive bandages stay on for up to 24 hours and feature a unique Hurt-Free Pad that won\'t stick to the wound as they wick away blood and fluids, allowing for gentle removal.",
            "From the #1 doctor recommended bandage brand, Band-Aid Brand Adhesive Bandages help protect against dirt and germs that may cause infection. Plus, wounds covered with a bandage heal faster than uncovered wounds.",
            "Apply bandage to clean, dry skin for minor wound care and change daily, when wet or as needed. For proper wound care, treat with wound an antiseptic ointment such as Neosporin prior to application."
        ]'
    ),
    (
        default, 
        'Gauze Rolls',
        'product7.png',
        4,
        100,
        1199,
        999,
        '[
            "Efficient and Effective: Our white gauze wrap rolls have been designed to secure the wound dressings effectively in place, efficiently reducing the risk of infections. The Stretch formula ensures gentle pressure over the wound while providing adequate breathability for its fast-paced recovery.",
            "Hospital Gauze Grade: The roller gauze has been developed with latex-free raw materials. The high-grade polyester-cotton rolls medically have been proven to be lint-free which prevents cotton fiber strands from sticking to the wound and ensures a pain-free removal experience to the user.",
            "Low-Cost: These non-sterile gauze bandage rolls have been manufactured in a clean and sanitary environment. They are packaged individually to maintain utter hygiene, absolutely diminishing the need for expensive and high-cost sterile gauze rolls.",
            "User-Friendly: Using our medical gauze rolls, one can timely provide first aid to oneself or their loved ones from the convenience of home, since they are highly elastic and conform easily to the affected body parts. For more information, please refer to the backside of the box.",
            "Multi-Functional: From wound care to being used as a bandage for burns\' dressing, our rolled gauze 4 inches offers versatile functionality. They can also be used as either mummy wraps or mummy bandages for your last-minute Halloween costume call, so enjoy your parties with easy mobility using our fine gauze."
        ]'
    ),
    (
        default, 
        'Protective Eye Goggles',
        'product8.png',
        4,
        100,
        2799,
        NULL,
        '[
            "Polyvinyl Chloride frame",
            "Polycarbonate lens",
            "Anti Fog Lens : The essential goods safety lab glasses are made of clear, highly transparent, wear-resistant PC material. Transparent lenses with anti-fog coating technology can protect the eyes of adults and maintain a clear field of vision from the external environment.",
            "Adjustable Strap: The adjustable black belt is suitable for your head circumference. Comes with soft eye socket and nose pad, one size fits all safety googles for men and women.",
            "Soft Edge Design: Made with a soft, flexible PVC body to ensure proper fit and comfort. The wraparound side shield construction provides a perfect fit and seal."
        ]'
    ),
    (
        default, 
        'Isopropyl Alcohol',
        'product9.png',
        4,
        100,
        2999,
        NULL,
        '[
            "Medical Grade Isopropyl Alcohol",
            "First aid to help prevent risk of infection from minor cuts, scrapes and burns",
            "No heavy metals or harmful organics",
            "Used in the production of sanitizers",
            "Less than 0.001 g/100 mL non-volatile residues"
        ]'
    ),
    (
        default, 
        'Barbicide',
        'product10.png',
        4,
        100,
        2499,
        NULL,
        '[
            "It is an easy way for the professional groomer to disinfect comb, brushes, shears, and more",
            "Kills ringworm, HIV virus, staph, bacteria, and other pathogens",
            "Barbicide disinfectant contains a powerful rust inhibitor",
            "Concentrated liquid, 4 ounce makes one gallon of clear blue solution, a 64 ounce bottle makes 16 gallons",
            "Metals can be immersed for hours without rusting, but should be oiled afterward; measures 10-1/2-inch length by 4-1/2-inch width by 4-1/2-inch height"
        ]'
    ),
    (
        default, 
        'Water Purification Tablets',
        'product11.png',
        4,
        100,
        1199,
        NULL,
        '[
            "Each Aquatab is 49mg with 16.88% Sodium Dichloroisocyanurate creating 2.6ppm available chlorine. When dissolved in 2 quarts of water the easy to use tablets disinfect the water for safe drinking in as little as 30 minutes. For water that requires filtering and removal of dirt particles, such as water from a stream or river, use 1 tablet for every 0.75 liters of filtered water.",
            "Protect you and your family during outdoor activities, natural disasters and emergency situations where boiling water is not an option. Be sure to read instructions before use.",
            "Aquatabs are conveniently packaged to retain freshness and start with a 5 Year Shelf Life. Each Strip of Aquatabs contains 10 individually sealed tablets.",
            "Tablets are so small that they easily fit into any pocket, pouch, purse, bag, backpack, drawer, emergency preparedness kit, disaster relief pack and more."
        ]'
    ),
    (
        default, 
        'Glowsticks (6 ct)',
        'product12.png',
        4,
        100,
        399,
        199,
        '[
            "SAFE AND ECO-FRIENDLY: Using the most innovative industrial grade construction technique, these glow sticks are waterproof, non-flammable and have a non-toxic chemistry. This means they guarantee a long lasting and environmentally friendly option for lighting up your party.",
            "PREMIUM QUALITY: These Ultra Bright Glow Sticks are made from industrial grade construction which uses a perfect blend of premium materials to provide you Non-Toxic, waterproof and CPSIA Compliant party glow sticks that assures a lasting use of up to 12 hours, more fun and 100% safety.",
            "OUR QUALITY PROMISE: We have made these glow sticks from premium materials using industrial grade construction to provide you a distinctive party supply that lights up your special event with safety in mind. So, we are sure you will love the effect this sticks will have on your party."
        ]'
    ),
    (
        default, 
        'Vitafusion Vitamins',
        'product13.png',
        3,
        100,
        2199,
        NULL,
        '[
            "Tasty and easy to take alternative to pills",
            "Delicious natural flavors. Supports bone health",
            "Contains no gluten (wheat), milk, eggs, peanuts, or soy",
            "Just two per day provides multivitamins and minerals you may need",
            "Multi-vitamin and mineral formula in naturallly flavored gummies with up to 75 servings per bottle"
        ]'
    ),
    (
        default, 
        'Tylenol Extra Strength',
        'product14.png',
        5,
        100,
        999,
        799,
        '[
            "Tylenol Extra Strength Caplets with 500mg of acetaminophen to provide temporary relief of minor aches and pains and help reduce fever",
            "Each extra strength caplet contains 500 mg of acetaminophen for effective, lasting pain relief, and has an excellent safety profile when used as directed",
            "Use as a fever reducer and to help provide relief of common pain symptoms including headache, backache, toothache, menstrual cramps and pain caused by the common cold",
            "This extra strength acetaminophen pain reliever can be used by adults and children who are 12 years and older",
            "From the #1 doctor recommended brand for pain relief and fever reduction, experience relief from minor aches and pains with Tylenol"
        ]'
    ),
    (
        default, 
        'Advil Tablets',
        'product15.png',
        3,
        100,
        699,
        NULL,
        '[
            "Relieve Pain And Reduce Fever: Whether you have occasional muscle aches, backaches, minor arthritis pain, or other aches and pains, Advil stops pain at the site of inflammation so you can get relief where you need it",
            "Pain Relief: Advil Coated Tablets contain 200mg of Ibuprofen; Tough headache, minor arthritis, menstrual cramps, backache, and other pains don’t stand a chance against Advil",
            "Unbeatable Strength: Millions of people choose Advil as their medicine for powerful pain relief; Use as a fever reducer and to help alleviate common pain symptoms including headache, backache, toothache and pain caused by the common cold",
            "Safe Pain Relief: For over 35 years, millions of people choose Advil to deliver powerful pain relief from many kinds of acute pain including headache, backache and joint and minor arthritis pain",
            "Number 1 Ibuprofen Brand: Advil delivers unbeatable strength of tough pain; Add Advil to your cart today and get power over pain; This oral pain reliever can be used by adults and children who are 12 years and older"
        ]'
    ),
    (
        default, 
        'Forehead Thermometer',
        'product16.png',
        3,
        100,
        1899,
        NULL,
        '[
            "Accurate and fast: This Infrared forehead thermometer is equipped with exceptional microchip and a sensitivity sensor. Infrared senor can precisely detecting the infrared heat given off by the forehead and quickly measuring to get the reading in 1 second",
            "Engineered technology: The non contact infrared body thermometer is design to minimize the errors in the software program by following sound and light enginnering design processes, risk analysis and soft ware validation",
            "No touch forehead 1-5cm: The measuring distance between the thermometer and the forehead must be 1-5 cm. Non-contact thermometer is more convenient than standard thermometer and touch thermometer",
            "50 readings memory storages: Our thermometer can memory 50 readings to continusly track your family member\'s tempreature. Which can handle it in advance if your family members\' temperature is slightly high",
            "Multiple measurement modes: Thermometers can not only measure body temperature, but also measure the temperature of objects. It is suitable for all ages. Press and hold the set button for 3 seconds, then press the \\"memo\\" or the \\"mode\\" to switch ℃ and ℉"
        ]'
    );