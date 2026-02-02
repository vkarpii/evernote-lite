USE evernote_lite;

INSERT INTO folders (user_id, name) VALUES
(1, CONCAT('Folder ', FLOOR(RAND()*100))),
(1, CONCAT('Folder ', FLOOR(RAND()*100)));

INSERT INTO tags (name) VALUES
(CONCAT('tag_', FLOOR(RAND()*1000))),
(CONCAT('tag_', FLOOR(RAND()*1000))),
(CONCAT('tag_', FLOOR(RAND()*1000)));

INSERT INTO notes (user_id, title, content)
VALUES
(1, CONCAT('Note ', FLOOR(RAND()*1000)), 'Random content A'),
(1, CONCAT('Note ', FLOOR(RAND()*1000)), 'Random content B'),
(1, CONCAT('Note ', FLOOR(RAND()*1000)), 'Random content C'),
(1, CONCAT('Note ', FLOOR(RAND()*1000)), 'Random content D'),
(1, CONCAT('Note ', FLOOR(RAND()*1000)), 'Random content E');

INSERT INTO note_folders (note_id, folder_id)
SELECT n.id, f.id
FROM notes n
CROSS JOIN folders f
WHERE n.user_id = 1
AND f.user_id = 1;

INSERT INTO note_tags (note_id, tag_id)
SELECT n.id, t.id
FROM notes n
CROSS JOIN tags t
WHERE n.user_id = 1;
