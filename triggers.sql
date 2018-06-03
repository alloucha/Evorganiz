CREATE OR REPLACE TRIGGER checkBudgetIsPositif 
BEFORE INSERT ON Event
FOR EACH ROW
BEGIN
	IF NEW.budgetMaxEvent < 0 THEN
               SET NEW.budgetMaxEvent = 0;
	END;
END;

CREATE OR REPLACE TRIGGER checkPriceBuffet
FOR EACH ROW
BEGIN
	IF NEW.pricePerPersonn < 0 THEN
               SET NEW.pricePerPersonn = 0;
	END;
END;


