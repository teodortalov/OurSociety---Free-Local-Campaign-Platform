SELECT
    DATE_FORMAT(last_seen, '%Y') AS period,
    COUNT(*) as count
FROM users
WHERE
    role = 'citizen' AND
	last_seen IS NOT NULL
GROUP BY
	YEAR(last_seen)
ORDER BY
	last_seen DESC
LIMIT 10
