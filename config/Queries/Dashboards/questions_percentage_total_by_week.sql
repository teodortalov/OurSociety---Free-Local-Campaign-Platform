SELECT
    DATE_FORMAT(answers.created, '%Y-W%u') AS period,
    COUNT(*) as count
FROM answers
WHERE
	answers.created IS NOT NULL
GROUP BY
    YEARWEEK(answers.created)
ORDER BY
	answers.created DESC
LIMIT 10
