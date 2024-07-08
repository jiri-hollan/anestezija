CREATE VIEW pregledovalciKomb AS
SELECT ime, priimek FROM uporabnikiTbl WHERE pristop >=1
UNION
SELECT ime, priimek FROM pregledovalciTbl WHERE pregledovalciStatus >=1;