<?php

namespace Base;

use \Personas as ChildPersonas;
use \PersonasQuery as ChildPersonasQuery;
use \Exception;
use \PDO;
use Map\PersonasTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'personas' table.
 *
 *
 *
 * @method     ChildPersonasQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildPersonasQuery orderByNombreCompleto($order = Criteria::ASC) Order by the nombre_completo column
 * @method     ChildPersonasQuery orderByCorreo($order = Criteria::ASC) Order by the correo column
 *
 * @method     ChildPersonasQuery groupById() Group by the id column
 * @method     ChildPersonasQuery groupByNombreCompleto() Group by the nombre_completo column
 * @method     ChildPersonasQuery groupByCorreo() Group by the correo column
 *
 * @method     ChildPersonasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPersonasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPersonasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPersonasQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPersonasQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPersonasQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPersonasQuery leftJoinUsuarios($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuarios relation
 * @method     ChildPersonasQuery rightJoinUsuarios($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuarios relation
 * @method     ChildPersonasQuery innerJoinUsuarios($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuarios relation
 *
 * @method     ChildPersonasQuery joinWithUsuarios($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Usuarios relation
 *
 * @method     ChildPersonasQuery leftJoinWithUsuarios() Adds a LEFT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildPersonasQuery rightJoinWithUsuarios() Adds a RIGHT JOIN clause and with to the query using the Usuarios relation
 * @method     ChildPersonasQuery innerJoinWithUsuarios() Adds a INNER JOIN clause and with to the query using the Usuarios relation
 *
 * @method     \UsuariosQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPersonas findOne(ConnectionInterface $con = null) Return the first ChildPersonas matching the query
 * @method     ChildPersonas findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPersonas matching the query, or a new ChildPersonas object populated from the query conditions when no match is found
 *
 * @method     ChildPersonas findOneById(int $id) Return the first ChildPersonas filtered by the id column
 * @method     ChildPersonas findOneByNombreCompleto(string $nombre_completo) Return the first ChildPersonas filtered by the nombre_completo column
 * @method     ChildPersonas findOneByCorreo(string $correo) Return the first ChildPersonas filtered by the correo column *

 * @method     ChildPersonas requirePk($key, ConnectionInterface $con = null) Return the ChildPersonas by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOne(ConnectionInterface $con = null) Return the first ChildPersonas matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonas requireOneById(int $id) Return the first ChildPersonas filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByNombreCompleto(string $nombre_completo) Return the first ChildPersonas filtered by the nombre_completo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPersonas requireOneByCorreo(string $correo) Return the first ChildPersonas filtered by the correo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPersonas[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPersonas objects based on current ModelCriteria
 * @method     ChildPersonas[]|ObjectCollection findById(int $id) Return ChildPersonas objects filtered by the id column
 * @method     ChildPersonas[]|ObjectCollection findByNombreCompleto(string $nombre_completo) Return ChildPersonas objects filtered by the nombre_completo column
 * @method     ChildPersonas[]|ObjectCollection findByCorreo(string $correo) Return ChildPersonas objects filtered by the correo column
 * @method     ChildPersonas[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PersonasQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PersonasQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'inmobiliaria', $modelName = '\\Personas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPersonasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPersonasQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPersonasQuery) {
            return $criteria;
        }
        $query = new ChildPersonasQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPersonas|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PersonasTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PersonasTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPersonas A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, nombre_completo, correo FROM personas WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPersonas $obj */
            $obj = new ChildPersonas();
            $obj->hydrate($row);
            PersonasTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPersonas|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonasTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre_completo column
     *
     * Example usage:
     * <code>
     * $query->filterByNombreCompleto('fooValue');   // WHERE nombre_completo = 'fooValue'
     * $query->filterByNombreCompleto('%fooValue%', Criteria::LIKE); // WHERE nombre_completo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombreCompleto The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByNombreCompleto($nombreCompleto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombreCompleto)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_NOMBRE_COMPLETO, $nombreCompleto, $comparison);
    }

    /**
     * Filter the query on the correo column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreo('fooValue');   // WHERE correo = 'fooValue'
     * $query->filterByCorreo('%fooValue%', Criteria::LIKE); // WHERE correo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByCorreo($correo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonasTableMap::COL_CORREO, $correo, $comparison);
    }

    /**
     * Filter the query by a related \Usuarios object
     *
     * @param \Usuarios|ObjectCollection $usuarios the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPersonasQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios, $comparison = null)
    {
        if ($usuarios instanceof \Usuarios) {
            return $this
                ->addUsingAlias(PersonasTableMap::COL_ID, $usuarios->getIdPersona(), $comparison);
        } elseif ($usuarios instanceof ObjectCollection) {
            return $this
                ->useUsuariosQuery()
                ->filterByPrimaryKeys($usuarios->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUsuarios() only accepts arguments of type \Usuarios or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Usuarios relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function joinUsuarios($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Usuarios');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Usuarios');
        }

        return $this;
    }

    /**
     * Use the Usuarios relation Usuarios object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsuariosQuery A secondary query class using the current class as primary query
     */
    public function useUsuariosQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsuarios($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Usuarios', '\UsuariosQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPersonas $personas Object to remove from the list of results
     *
     * @return $this|ChildPersonasQuery The current query, for fluid interface
     */
    public function prune($personas = null)
    {
        if ($personas) {
            $this->addUsingAlias(PersonasTableMap::COL_ID, $personas->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the personas table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PersonasTableMap::clearInstancePool();
            PersonasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PersonasTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PersonasTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PersonasTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PersonasTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PersonasQuery
